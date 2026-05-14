<?php

class KerjakanUjian extends Controller
{
    public function index($id_ujian = null)
    {
        if ($_SESSION['user']['role'] !== 'siswa') {
            header('location: ' . Constant::DIRNAME . 'dashboard');
            exit;
        }

        if ($id_ujian === null) {
            header('location: ' . Constant::DIRNAME . 'ujianSiswa');
            exit;
        }

        $nisn = $_SESSION['user']['username'];
        $ujian = $this->model('KerjakanUjian_model')->getUjianById($id_ujian);
        if (!$ujian) {
            Flasher::setFlash('Ujian tidak ditemukan.', 'error');
            header('location: ' . Constant::DIRNAME . 'ujianSiswa');
            exit;
        }

        $now    = time();
        $mulai  = strtotime($ujian['jadwal_mulai']);
        $selesai = strtotime($ujian['jadwal_selesai']);
        if ($now < $mulai || $now > $selesai) {
            Flasher::setFlash('Ujian tidak tersedia saat ini.', 'error');
            header('location: ' . Constant::DIRNAME . 'ujianSiswa');
            exit;
        }

        $sesiUjian = $this->model('KerjakanUjian_model')->getSesiUjian($id_ujian, $nisn);
        if (!$sesiUjian) {
            $this->model('KerjakanUjian_model')->buatSesiUjian($id_ujian, $nisn);
            $sesiUjian = $this->model('KerjakanUjian_model')->getSesiUjian($id_ujian, $nisn);
        }

        if ($sesiUjian['status'] === 'selesai') {
            Flasher::setFlash('Kamu sudah menyelesaikan ujian ini.', 'info');
            header('location: ' . Constant::DIRNAME . 'hasilUjian');
            exit;
        }

        $soalList = $this->model('KerjakanUjian_model')->getSoalUjian($id_ujian);
        $jawabanSiswa = $this->model('KerjakanUjian_model')->getJawabanSiswa($sesiUjian['id_ujian_siswa']);
        $waktuMasuk  = strtotime($sesiUjian['waktu_masuk']);
        $durasiDetik = $this->waktuKeDetik($ujian['waktu_pengerjaan']);
        $batasWaktu  = $waktuMasuk + $durasiDetik;
        $sisaWaktu   = max(0, $batasWaktu - $now);

        $data['title']        = 'Kerjakan Ujian';
        $data['css']          = 'style.kerjakanujian';
        $data['ujian']        = $ujian;
        $data['soalList']     = $soalList;
        $data['jawabanSiswa'] = $jawabanSiswa;
        $data['sesiUjian']    = $sesiUjian;
        $data['sisaWaktu']    = $sisaWaktu;
        $data['totalSoal']    = count($soalList);

        $this->view('templates/header', $data);
        $this->view('kerjakanujian/index', $data);
        $this->view('templates/footer');
    }

    public function simpanJawaban()
    {
        header('Content-Type: application/json');

        if ($_SESSION['user']['role'] !== 'siswa') {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }

        $body = json_decode(file_get_contents('php://input'), true);

        $id_ujian_siswa = $body['id_ujian_siswa'] ?? null;
        $id_bank_soal   = $body['id_bank_soal']   ?? null;
        $answer         = $body['answer']          ?? null;

        if (!$id_ujian_siswa || !$id_bank_soal || !$answer) {
            echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
            exit;
        }

        $valid = ['ja', 'jb', 'jc', 'jd'];
        if (!in_array($answer, $valid)) {
            echo json_encode(['success' => false, 'message' => 'Jawaban tidak valid']);
            exit;
        }

        $result = $this->model('KerjakanUjian_model')->simpanJawaban($id_ujian_siswa, $id_bank_soal, $answer);
        echo json_encode(['success' => (bool)$result]);
        exit;
    }

    public function submit()
    {
        header('Content-Type: application/json');

        if ($_SESSION['user']['role'] !== 'siswa') {
            echo json_encode(['success' => false]);
            exit;
        }

        $body           = json_decode(file_get_contents('php://input'), true);
        $id_ujian_siswa = $body['id_ujian_siswa'] ?? null;
        $id_ujian       = $body['id_ujian']       ?? null;

        if (!$id_ujian_siswa || !$id_ujian) {
            echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
            exit;
        }

        $nisn  = $_SESSION['user']['username'];
        $this->model('KerjakanUjian_model')->selesaikanUjian($id_ujian_siswa);
        $ujian = $this->model('KerjakanUjian_model')->getUjianById($id_ujian);
        if ($ujian && strtolower($ujian['penilaian']) === 'otomatis') {
            $this->model('KerjakanUjian_model')->hitungNilaiOtomatis($id_ujian, $id_ujian_siswa, $nisn);
        }

        echo json_encode(['success' => true]);
        exit;
    }

    private function waktuKeDetik(string $waktu): int
    {
        $parts = explode(':', $waktu);
        return (int)($parts[0]) * 3600 + (int)($parts[1]) * 60 + (int)($parts[2] ?? 0);
    }
}