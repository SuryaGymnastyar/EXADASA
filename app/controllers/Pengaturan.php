<?php

class Pengaturan extends Controller
{
    public function index()
    {
        if ($_SESSION['user']['role'] !== "admin") {
            header('location: ' . Constant::DIRNAME . 'dashboard');
            exit;
        }

        $data["title"] = "Pengaturan";
        $data["css"] = "style.pengaturan";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('pengaturan/index', $data);
        $this->view('templates/footer');
    }
}