<?php

class Log extends Controller
{
    public function index()
    {
        if (!$_SESSION['user']['role'] == "admin") {
            header('location: ' . Constant::DIRNAME . 'dashboard');
            exit;
        }
        $data["title"] = "Log Aktivitas";
        $data["css"] = "style.log";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('log/index', $data);
        $this->view('templates/footer');
    }
}