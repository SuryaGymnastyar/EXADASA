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
            $this->db->query('SELECT ds.id_kelas, ds.id_jurusan FROM data_siswa ds WHERE ds.nisn = :nisn LIMIT 1');
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
                           OR JSON_CONTAINS(id_kelas, :kelas_json)
                       )
                     ORDER BY jadwal_mulai ASC"
                );
                $this->db->bind('kelas_json', json_encode($id_kelas));
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
            return false;
        }
    }

    public function getStatusPengerjaanSiswa(string $nisn): array
    {
        try {
            $this->db->query('SELECT id_ujian, status FROM ujian_siswa WHERE nisn = :nisn');
            $this->db->bind('nisn', $nisn);
            $rows = $this->db->resultSet();

            $map = [];
            foreach ($rows as $row) {
                $map[$row['id_ujian']] = $row['status'];
            }
            return $map;
        } catch (PDOException $e) {
            return [];
        }
    }
}