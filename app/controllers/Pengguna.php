<?php

class Pengguna extends Controller
{
    public function index()
    {
        if (!$_SESSION['user']['role'] == "admin") {
            header('location: ' . Constant::DIRNAME . 'dashboard');
            exit;
        }
        $data["title"] = "Pengguna";
        $data["css"] = "style.pengguna";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('pengguna/index', $data);
        $this->view('templates/footer');
    }
}