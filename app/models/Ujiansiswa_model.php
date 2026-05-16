<?php

class UjianSiswa_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataSiswa(string $nisn)
    {
        try {
            $this->db->query('SELECT id_kelas, id_jurusan FROM data_siswa WHERE nisn = :nisn LIMIT 1');
            $this->db->bind('nisn', $nisn);
            return $this->db->single();
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getUjianUntukSiswa(?string $id_kelas): array
    {
        try {
            if ($id_kelas) {
                $this->db->query(
                    "SELECT * FROM ujian
                     WHERE status = 'aktif'
                       AND (
                           id_kelas IS NULL
                           OR JSON_CONTAINS(id_kelas, JSON_QUOTE(:id_kelas))
                       )
                     ORDER BY jadwal_mulai ASC"
                );
                $this->db->bind('id_kelas', $id_kelas);
            } else {
                $this->db->query("SELECT * FROM ujian WHERE status = 'aktif' AND id_kelas IS NULL ORDER BY jadwal_mulai ASC");
            }
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getUjianById(string $id_ujian)
    {
        try {
            $this->db->query('SELECT * FROM ujian WHERE id_ujian = :id LIMIT 1');
            $this->db->bind('id', $id_ujian);
            return $this->db->single();
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getStatusPengerjaanSiswa(string $nisn): array
    {
        try {
            $this->db->query(
                "SELECT us.id_ujian, us.status, ns.id_nilai_siswa 
                 FROM ujian_siswa us 
                 LEFT JOIN nilai_siswa ns ON us.id_ujian_siswa = ns.id_ujian_siswa 
                 WHERE us.nisn = :nisn"
            );
            $this->db->bind('nisn', $nisn);
            $rows = $this->db->resultSet();

            $map = [];
            foreach ($rows as $row) {
                $map[$row['id_ujian']] = [
                    'status'    => $row['status'],
                    'is_scored' => !empty($row['id_nilai_siswa'])
                ];
            }
            return $map;
        } catch (PDOException $e) {
            return [];
        }
    }
}