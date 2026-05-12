<?php

class Dashboard extends Controller {
    public function index() {
        $data["title"] = "Dashboard";
        $data["css"] = "style.dashboard";

        $data['pengumuman'] = $this->model('Pengumuman_model')->getAll();

        if ($_SESSION['user']['role'] == 'siswa') {
            $nisn = $_SESSION['user']['username'];
            
            $data['user_siswa'] = $this->model('Siswa_model')->getByNISN($nisn);
            $data['list_ujian'] = $this->model('Ujian_model')->getUjianHariIni();
            $data['ujian_mendatang'] = $this->model('Ujian_model')->getUjianTerdekat();

            $data['statistik'] = [
                'ujian_selesai' => $this->model('Ujian_model')->countSelesai($nisn),
                'ujian_hari_ini' => count($data['list_ujian']),
                'total_pengumuman' => count($data['pengumuman'])
            ];
        }

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }

    public function logout() {
        session_destroy();
        unset($_SESSION['user']);
        header('location: ' . Constant::DIRNAME . 'login');
        exit;
    }
}