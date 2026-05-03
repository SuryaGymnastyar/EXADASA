<?php

class Ujian extends Controller {
    public function index() {
        if(!$_SESSION['user']['role'] == "petugas" && !$_SESSION['user']['role'] == "admin") {
            header('location: ' . Constant::DIRNAME . 'dashboard');
            exit;
        }
        $data["title"] = "Ujian";
        $data["css"] = "style.ujian";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('ujian/index', $data);
        $this->view('templates/footer');
    }
}