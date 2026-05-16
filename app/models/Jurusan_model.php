<?php

class Jurusan_model
{
    private object $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllJurusan()
    {
        try {
            $this->db->query("SELECT * FROM jurusan ORDER BY created_at DESC");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getJurusanById($id)
    {
        try {
            $this->db->query("SELECT * FROM jurusan WHERE id_jurusan = :id");
            $this->db->bind("id", $id);
            return $this->db->single();
        } catch (Exception $e) {
            return null;
        }
    }

    public function tambahJurusan($data)
    {
        try {
            $id_jurusan = htmlspecialchars(trim($data['id_jurusan']));
            $nama_jurusan = htmlspecialchars(trim($data['nama_jurusan']));
            $singkatan_jurusan = htmlspecialchars(trim($data['singkatan_jurusan']));
            $deskripsi = htmlspecialchars(trim($data['deskripsi']));

            $this->db->beginTransaction();
            
            $query = "INSERT INTO jurusan (id_jurusan, nama_jurusan, singkatan_jurusan, deskripsi) VALUES (:id_jurusan, :nama_jurusan, :singkatan_jurusan, :deskripsi)";
            $this->db->query($query);
            $this->db->bind("id_jurusan", $id_jurusan);
            $this->db->bind("nama_jurusan", $nama_jurusan);
            $this->db->bind("singkatan_jurusan", $singkatan_jurusan);
            $this->db->bind("deskripsi", $deskripsi);
            $this->db->execute();

            for ($i = 10; $i <= 12; $i++) {
                $this->db->query("INSERT INTO kelas (id_kelas, id_jurusan, tingkat) VALUES (:id_kelas, :id_jurusan, :tingkat)");
                $this->db->bind("id_kelas", $i . '-' . $id_jurusan);
                $this->db->bind("id_jurusan", $id_jurusan);
                $this->db->bind("tingkat", $i);
                $this->db->execute();
            }

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function updateJurusan($data)
    {
        try {
            $query = "UPDATE jurusan SET nama_jurusan = :nama_jurusan, deskripsi = :deskripsi WHERE id_jurusan = :id_jurusan";
            $this->db->query($query);
            $this->db->bind("id_jurusan", $data['id_jurusan']);
            $this->db->bind("nama_jurusan", $data['nama_jurusan']);
            $this->db->bind("deskripsi", $data['deskripsi']);
            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function hapusJurusan($id)
    {
        try {
            $this->db->beginTransaction();

            $this->db->query("DELETE FROM kelas WHERE id_jurusan = :id");
            $this->db->bind("id", $id);
            $this->db->execute();

            $this->db->query("DELETE FROM jurusan WHERE id_jurusan = :id");
            $this->db->bind("id", $id);
            $this->db->execute();
            $rows = $this->db->rowCount();

            $this->db->commit();
            return $rows;
        } catch (PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function getJurusanStats()
    {
        try {
            $this->db->query("SELECT j.id_jurusan, j.nama_jurusan, COUNT(ds.nisn) as total_siswa 
                              FROM jurusan j 
                              LEFT JOIN data_siswa ds ON j.id_jurusan = ds.id_jurusan 
                              GROUP BY j.id_jurusan");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getKelasByJurusan(string $id_jurusan)
    {
        try {
            $this->db->query("SELECT * FROM kelas WHERE id_jurusan = :id_jurusan");
            $this->db->bind("id_jurusan", $id_jurusan);
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return [];
        }
    }
}
