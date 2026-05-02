<?php

class Monitoring extends Controller {
    public function index() {
        $data["title"] = "Monitoring";
        $data["css"] = "style.monitoring";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('monitoring/index', $data);
        $this->view('templates/footer');
    }
}
