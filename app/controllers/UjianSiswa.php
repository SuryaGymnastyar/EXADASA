<?php

class UjianSiswa extends Controller {
    public function index() {
        $data["title"] = "Ujian Siswa";
        $data["css"] = "style.ujian.siswa";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('ujiansiswa/index', $data);
        $this->view('templates/footer');
    }
}