<?php

class UjianSiswa extends Controller
{
    public function index()
    {
        if ($_SESSION['user']['role'] !== 'siswa') {
            header('location: ' . Constant::DIRNAME . 'dashboard');
            exit;
        }

        $nisn = $_SESSION['user']['username'];
        $dataSiswa = $this->model('UjianSiswa_model')->getDataSiswa($nisn);
        $id_kelas  = $dataSiswa['id_kelas'] ?? null;
        $listUjian = $this->model('UjianSiswa_model')->getUjianUntukSiswa($id_kelas);
        $statusMap = $this->model('UjianSiswa_model')->getStatusPengerjaanSiswa($nisn);

        $data['title']     = 'Ujian Siswa';
        $data['css']       = 'style.ujian.siswa';
        $data['listUjian'] = $listUjian;
        $data['statusMap'] = $statusMap;

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('ujiansiswa/index', $data);
        $this->view('templates/footer');
    }

    public function cekKode()
    {
        header('Content-Type: application/json');

        if ($_SESSION['user']['role'] !== 'siswa') {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }

        $body     = json_decode(file_get_contents('php://input'), true);
        $id_ujian = trim($body['id_ujian'] ?? '');
        $kode     = strtoupper(trim($body['kode'] ?? ''));

        if (!$id_ujian || !$kode) {
            echo json_encode(['success' => false, 'message' => 'Data tidak lengkap.']);
            exit;
        }

        $ujian = $this->model('UjianSiswa_model')->getUjianById($id_ujian);

        if (!$ujian) {
            echo json_encode(['success' => false, 'message' => 'Ujian tidak ditemukan.']);
            exit;
        }

        if ($ujian['status'] !== 'aktif') {
            echo json_encode(['success' => false, 'message' => 'Ujian tidak aktif.']);
            exit;
        }

        $now     = time();
        $mulai   = strtotime($ujian['jadwal_mulai']);
        $selesai = strtotime($ujian['jadwal_selesai']);
        if ($now < $mulai) {
            echo json_encode(['success' => false, 'message' => 'Ujian belum dimulai.']);
            exit;
        }
        if ($now > $selesai) {
            echo json_encode(['success' => false, 'message' => 'Ujian sudah berakhir.']);
            exit;
        }

        if (strtoupper(trim($ujian['kode_ujian'])) !== $kode) {
            echo json_encode(['success' => false, 'message' => 'Kode ujian salah.']);
            exit;
        }

        echo json_encode([
            'success'  => true,
            'redirect' => Constant::DIRNAME . 'kerjakanUjian/' . $id_ujian,
        ]);
        exit;
    }
}