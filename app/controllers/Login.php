<?php

class Login extends Controller {
    public function index() {
        $data["title"] = "Login";
        $data["css"]   = "style.login";
        $this->view('templates/header', $data);
        $this->view('login/index', $data);
        $this->view('templates/footer');
    }

    public function login() {
        if ($this->model("Login_model")->login($_POST)) {
            $pengguna = $_SESSION['user']['username'] ?? ($_POST['username'] ?? 'Unknown');
            $this->model('Dashboard_model')->insertLog($pengguna, 'Login ke sistem');

            Flasher::setFlash("Login Berhasil", "success");
            header('location: ' . Constant::DIRNAME . 'dashboard');
            exit;
        } else {
            Flasher::setFlash("Username / Password Salah", "error");
            header('location: ' . Constant::DIRNAME . 'login');
            exit;
        }
    }
}