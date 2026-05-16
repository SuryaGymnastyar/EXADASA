<?php

class Profile_model
{
    private object $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserByRole(string $id_user, string $role)
    {
        try {
            if ($role == 'siswa') {
                $this->db->query('SELECT u.password, s.foto, s.nisn as username, s.nama_lengkap, s.email, k.tingkat as kelas, j.singkatan_jurusan as jurusan FROM users as u JOIN siswa as s ON s.nisn = u.username JOIN data_siswa as ds ON ds.nisn = s.nisn JOIN kelas as k ON k.id_kelas = ds.id_kelas JOIN jurusan as j ON j.id_jurusan = ds.id_jurusan WHERE s.nisn = :id_user');
                $this->db->bind('id_user', $id_user);
                return $this->db->single();
            } else if ($role == 'petugas') {
                $this->db->query('SELECT u.password, p.foto, p.nip as username, p.nama_lengkap, p.email FROM users as u JOIN petugas as p ON u.username = p.nip WHERE nip = :id_user');
                $this->db->bind('id_user', $id_user);
                return $this->db->single();
            } else {
                $this->db->query('SELECT username as nama_lengkap, username as username, role FROM users WHERE username = :id_user');
                $this->db->bind('id_user', $id_user);
                return $this->db->single();
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getStudentStats(string $nisn)
    {
        try {
            $this->db->query("SELECT COUNT(*) as total_ujian, AVG(nilai) as rata_rata FROM nilai_siswa WHERE nisn = :nisn");
            $this->db->bind('nisn', $nisn);
            return $this->db->single();
        } catch (PDOException $e) {
            return ['total_ujian' => 0, 'rata_rata' => 0];
        }
    }

    public function prosesUpdate($post, $files, $sessionUser)
    {
        $role = $sessionUser['role'];
        $username = $sessionUser['username'];
        $db_user = $this->getUserByRole($username, $role);

        $updateData = [
            'id' => $username,
            'nama' => $post['name'] ?? $db_user['nama_lengkap'],
            'email' => $post['email'] ?? $db_user['email']
        ];

        if (isset($files['foto_profil']) && $files['foto_profil']['error'] == 0) {
            $namaFile = $files['foto_profil']['name'];
            $ekstensi = pathinfo($namaFile, PATHINFO_EXTENSION);
            $namaBaru = uniqid() . '.' . $ekstensi;
            $tujuan = 'asset/img/' . $namaBaru;

            if (move_uploaded_file($files['foto_profil']['tmp_name'], $tujuan)) {
                $updateData['foto'] = $namaBaru;
                $_SESSION['user']['foto'] = $namaBaru;
            }
        }

        $this->updateProfile($updateData, $role);
        $_SESSION['user']['nama_lengkap'] = $updateData['nama'];

        if (!empty($post['current_password']) && !empty($post['new_password'])) {
            if (password_verify($post['current_password'], $db_user['password'])) {
                if ($post['new_password'] === $post['confirm_password']) {
                    $this->updatePassword($username, $post['new_password']);
                    return ['status' => 'success', 'message' => 'Profil dan Kata sandi berhasil diperbarui'];
                } else {
                    return ['status' => 'error', 'message' => 'Konfirmasi kata sandi tidak cocok'];
                }
            } else {
                return ['status' => 'error', 'message' => 'Kata sandi lama salah'];
            }
        }

        return ['status' => 'success', 'message' => 'Profil berhasil diperbarui'];
    }

    private function updateProfile($data, $role)
    {
        try {
            $this->db->beginTransaction();

            if ($role == 'siswa') {
                $query = "UPDATE siswa SET nama_lengkap = :nama, email = :email";
                if (isset($data['foto'])) $query .= ", foto = :foto";
                $query .= " WHERE nisn = :id";
                
                $this->db->query($query);
                $this->db->bind('id', $data['id']);
                $this->db->bind('nama', $data['nama']);
                $this->db->bind('email', $data['email']);
                if (isset($data['foto'])) $this->db->bind('foto', $data['foto']);
                $this->db->execute();
            } else if ($role == 'petugas') {
                $query = "UPDATE petugas SET nama_lengkap = :nama, email = :email";
                if (isset($data['foto'])) $query .= ", foto = :foto";
                $query .= " WHERE nip = :id";

                $this->db->query($query);
                $this->db->bind('id', $data['id']);
                $this->db->bind('nama', $data['nama']);
                $this->db->bind('email', $data['email']);
                if (isset($data['foto'])) $this->db->bind('foto', $data['foto']);
                $this->db->execute();
            }

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }

    private function updatePassword($username, $new_password)
    {
        try {
            $hash = password_hash($new_password, PASSWORD_BCRYPT);
            $this->db->query("UPDATE users SET password = :pass WHERE username = :user");
            $this->db->bind('pass', $hash);
            $this->db->bind('user', $username);
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
