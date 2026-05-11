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
                $this->db->execute();
                return $this->db->single();
            } else if ($role == 'petugas') {
                $this->db->query('SELECT u.password, p.foto, p.nip as username, p.nama_lengkap, p.email FROM users as u JOIN petugas as p ON u.username = p.nip WHERE nip = :id_user');
                $this->db->bind('id_user', $id_user);
                $this->db->execute();
                return $this->db->single();
            } else {
                $this->db->query('SELECT username as nama_lengkap, username as username, role FROM users WHERE username = :id_user');
                $this->db->bind('id_user', $id_user);
                $this->db->execute();
                return $this->db->single();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
