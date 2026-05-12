<?php

class Koreksi extends Controller {
    public function index() {
        if(!$_SESSION['user']['role'] == "petugas") {
            header('location: ' . Constant::DIRNAME . 'dashboard');
            exit;
        }
        
        $data["title"] = "Koreksi";
        $data["css"] = "style.koreksi";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('koreksi/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id = null) {
        if(!$_SESSION['user']['role'] == "petugas") {
            header('location: ' . Constant::DIRNAME . 'dashboard');
            exit;
        }

        if($id === null) {
            header('location: ' . Constant::DIRNAME . 'koreksi');
            exit;
        }
        
        $data["title"] = "Koreksi";
        $data["css"] = "style.koreksi.detail";
        $data["student_id"] = $id;

        
        $data["student"] = [
            'nama' => 'M. Rafly Saputra',
            'kelas' => 'XII IPA 1',
            'ujian' => 'Ujian Tengah Semester - Matematika',
            'waktu_submit' => '2026-04-20 09:55',
            'durasi' => '45 menit',
            'status' => 'pending',
            'inisial' => 'MR',
            'av' => 'av-blue',
        ];

    
        $data["questions"] = [
            [
                'no' => 1,
                'soal' => 'Diketahui f(x) = 2x² + 3x - 5. Tentukan nilai f(2)!',
                'opsi' => ['A' => '5', 'B' => '9', 'C' => '7', 'D' => '11'],
                'jawaban_siswa' => 'B',
                'kunci' => 'B',
                'skor_max' => 5,
                'skor' => 5,
                'status' => 'benar',
            ],
            [
                'no' => 2,
                'soal' => 'Hasil dari limit x→∞ (3x² + 2x)/(x² - 1) adalah...',
                'opsi' => ['A' => '1', 'B' => '2', 'C' => '3', 'D' => '0'],
                'jawaban_siswa' => 'A',
                'kunci' => 'C',
                'skor_max' => 5,
                'skor' => 0,
                'status' => 'salah',
            ],
            [
                'no' => 3,
                'soal' => 'Turunan pertama dari f(x) = x³ - 6x² + 12x - 8 adalah...',
                'opsi' => ['A' => '3x² - 12x + 12', 'B' => '3x² - 12x', 'C' => 'x² - 12x + 12', 'D' => '3x² + 12x + 12'],
                'jawaban_siswa' => 'A',
                'kunci' => 'A',
                'skor_max' => 5,
                'skor' => 5,
                'status' => 'benar',
            ],
            [
                'no' => 4,
                'soal' => 'Nilai dari integral ∫(2x + 3)dx adalah...',
                'opsi' => ['A' => 'x² + 3x + C', 'B' => '2x² + 3x + C', 'C' => 'x² + 3 + C', 'D' => '2x + 3 + C'],
                'jawaban_siswa' => 'A',
                'kunci' => 'A',
                'skor_max' => 5,
                'skor' => 5,
                'status' => 'benar',
            ],
            [
                'no' => 5,
                'soal' => 'Matriks A = [[1,2],[3,4]]. Determinan dari matriks A adalah...',
                'opsi' => ['A' => '-2', 'B' => '2', 'C' => '-10', 'D' => '10'],
                'jawaban_siswa' => 'A',
                'kunci' => 'A',
                'skor_max' => 5,
                'skor' => 5,
                'status' => 'benar',
            ],
            [
                'no' => 6,
                'soal' => 'Jika sin α = 3/5 dan α berada di kuadran I, maka nilai cos α adalah...',
                'opsi' => ['A' => '4/5', 'B' => '3/4', 'C' => '5/4', 'D' => '5/3'],
                'jawaban_siswa' => 'B',
                'kunci' => 'A',
                'skor_max' => 5,
                'skor' => 0,
                'status' => 'salah',
            ],
            [
                'no' => 7,
                'soal' => 'Hasil dari log₂ 32 adalah...',
                'opsi' => ['A' => '4', 'B' => '5', 'C' => '6', 'D' => '3'],
                'jawaban_siswa' => 'B',
                'kunci' => 'B',
                'skor_max' => 5,
                'skor' => 5,
                'status' => 'benar',
            ],
            [
                'no' => 8,
                'soal' => 'Persamaan garis yang melalui titik (2, 3) dan tegak lurus dengan garis y = 2x + 1 adalah...',
                'opsi' => ['A' => 'y = -½x + 4', 'B' => 'y = 2x - 1', 'C' => 'y = -2x + 7', 'D' => 'y = ½x + 2'],
                'jawaban_siswa' => 'A',
                'kunci' => 'A',
                'skor_max' => 5,
                'skor' => 5,
                'status' => 'benar',
            ],
            [
                'no' => 9,
                'soal' => 'Nilai dari C(8, 3) adalah...',
                'opsi' => ['A' => '56', 'B' => '336', 'C' => '28', 'D' => '120'],
                'jawaban_siswa' => 'A',
                'kunci' => 'A',
                'skor_max' => 5,
                'skor' => 5,
                'status' => 'benar',
            ],
            [
                'no' => 10,
                'soal' => 'Jika f(x) = 3x + 2 dan g(x) = x² - 1, maka (f ∘ g)(2) adalah...',
                'opsi' => ['A' => '11', 'B' => '14', 'C' => '9', 'D' => '17'],
                'jawaban_siswa' => 'A',
                'kunci' => 'A',
                'skor_max' => 5,
                'skor' => 5,
                'status' => 'benar',
            ],
        ];

        $questions = $data["questions"];
        $data["totalSoal"] = count($questions);
        $data["benar"] = count(array_filter($questions, fn($q) => $q['status'] === 'benar'));
        $data["salah"] = count(array_filter($questions, fn($q) => $q['status'] === 'salah'));
        $data["skorTotal"] = array_sum(array_map(fn($q) => $q['skor'] ?? 0, $questions));
        $data["skorMax"] = array_sum(array_map(fn($q) => $q['skor_max'], $questions));
        $data["persentase"] = $data["skorMax"] > 0 ? round(($data["skorTotal"] / $data["skorMax"]) * 100) : 0;

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('koreksi/detail', $data);
        $this->view('templates/footer');
    }
}
