<?php

class Ujian_model {
    private $table = 'ujian';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUjianHariIni() {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE DATE(jadwal_mulai) = CURDATE() ORDER BY jadwal_mulai ASC');
        return $this->db->resultSet();
    }

    public function getUjianTerdekat() {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE jadwal_mulai > NOW() ORDER BY jadwal_mulai ASC LIMIT 1');
        return $this->db->single();
    }

    public function countSelesai($nisn) {
        $this->db->query('SELECT COUNT(*) as total FROM ujian_siswa WHERE nisn = :nisn AND status = "Selesai"');
        $this->db->bind('nisn', $nisn);
        return $this->db->single()['total'] ?? 0;
    }
}