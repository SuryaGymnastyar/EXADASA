<?php

class Profile extends Controller {
    public function index() {
        $data['user'] = $this->model("Profile_model")->getUserByRole($_SESSION['user']['username'], $_SESSION['user']['role']);
        $data["title"] = "Profile";
        $data["css"] = "style.profile";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }
}