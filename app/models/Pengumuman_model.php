<?php
class Pengumuman_model {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function getAll() {
        $this->db->query('SELECT * FROM pengumuman ORDER BY created_at DESC');
        return $this->db->resultSet();
    }
}