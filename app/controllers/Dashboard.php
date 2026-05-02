<?php

class Dashboard extends Controller {
    public function index() {
        $data["title"] = "Dashboard";
        $data["css"] = "style.dashboard";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }

    public function logout() {
        session_destroy();
        unset($_SESSION['user']);
        header('location: ' . Constant::DIRNAME . 'login');
        exit;
    }
}