<?php

class Pengumuman extends Controller {
    public function index() {
        if(!$_SESSION['user']['role'] == "admin") {
            header('location: ' . Constant::DIRNAME . 'dashboard');
            exit;
        }

        $data["title"] = "Pengumuman";
        $data["css"] = "style.pengumuman";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('pengumuman/index', $data);
        $this->view('templates/footer');
    }
}