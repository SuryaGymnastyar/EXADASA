<?php

class Koreksi extends Controller {
    public function index() {
        $data["title"] = "Koreksi";
        $data["css"] = "style.koreksi";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('Koreksi/index', $data);
        $this->view('templates/footer');
    }
}
