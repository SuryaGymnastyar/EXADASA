<?php

class DashboardSiswa extends Controller {
    public function index() {
        $data["title"] = "DashboardSiswa";
        $data["css"] = "style.dashboard.siswa";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboardsiswa/index', $data);
        $this->view('templates/footer');
    }
}