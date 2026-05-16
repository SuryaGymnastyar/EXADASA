<?php

class Profile extends Controller
{
    public function index()
    {
        $role = $_SESSION['user']['role'];
        $username = $_SESSION['user']['username'];

        $data['user'] = $this->model("Profile_model")->getUserByRole($username, $role);
        $data["title"] = "Profile";
        $data["css"] = "style.profile";

        if ($role == 'siswa') {
            $stats = $this->model("Profile_model")->getStudentStats($username);
            $data['stats'] = $stats;
        }

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        $result = $this->model("Profile_model")->prosesUpdate($_POST, $_FILES, $_SESSION['user']);
        Flasher::setFlash($result['message'], $result['status']);
        $username = $_SESSION['user']['username'];
        $this->model('Dashboard_model')->insertLog($username, 'Memperbarui profil akun');
        header('location: ' . Constant::DIRNAME . 'profile');
        exit;
    }
}