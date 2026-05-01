<?php

class HasilUjian extends Controller {
    public function index() {
        $data["title"] = "HasilUjian";
        $data["css"] = "style.hasil.ujian";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('hasilujian/index', $data);
        $this->view('templates/footer');
    }
}