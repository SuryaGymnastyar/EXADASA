<?php

class Profile extends Controller {
    public function index() {
        $data["title"] = "Profile";
        $data["css"] = "style.profile";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }
}