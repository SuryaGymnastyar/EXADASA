<?php

class Profil extends Controller {
    public function index() {
        $data["title"] = "Profil";
        $data["css"] = "style.profil";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('profil/index', $data);
        $this->view('templates/footer');
    }
}