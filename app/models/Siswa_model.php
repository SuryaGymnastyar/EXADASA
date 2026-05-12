<?php
class Siswa_model {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function getByNISN($nisn) {
        $this->db->query('SELECT * FROM siswa WHERE nisn = :nisn');
        $this->db->bind('nisn', $nisn);
        return $this->db->single();
    }
}