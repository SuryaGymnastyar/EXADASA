<?php

class Ujian extends Controller {
    public function index() {
        $data["title"] = "Ujian";
        $this->view('templates/header', $data);
        $this->view('ujian/index', $data);
        $this->view('templates/footer');
    }
}