<?php

class Ujian extends Controller {
    public function index() {
        $data["title"] = "Ujian";
        $data["css"] = "style.ujian";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('ujian/index', $data);
        $this->view('templates/footer');
    }
}