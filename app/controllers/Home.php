<?php


class Home extends Controller {
    public function index() {
        $data["title"] = "Home";
        $data["css"] = "style.home";
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }   
}