<?php

class KerjakanUjian_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUjianById(string $id_ujian)
    {
        try {
            $this->db->query('SELECT * FROM ujian WHERE id_ujian = :id_ujian');
            $this->db->bind('id_ujian', $id_ujian);
            return $this->db->single();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getSesiUjian(string $id_ujian, string $nisn)
    {
        try {
            $this->db->query('SELECT * FROM ujian_siswa WHERE id_ujian = :id_ujian AND nisn = :nisn LIMIT 1');
            $this->db->bind('id_ujian', $id_ujian);
            $this->db->bind('nisn', $nisn);
            return $this->db->single();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function buatSesiUjian(string $id_ujian, string $nisn)
    {
        try {
            $id = uniqid('us_', true);
            $this->db->query('INSERT INTO ujian_siswa (id_ujian_siswa, id_ujian, nisn, status, waktu_masuk) VALUES (:id, :id_ujian, :nisn, "proses", NOW())');
            $this->db->bind('id', $id);
            $this->db->bind('id_ujian', $id_ujian);
            $this->db->bind('nisn', $nisn);
            $this->db->execute();
            return $id;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function selesaikanUjian(string $id_ujian_siswa)
    {
        try {
            $this->db->query("UPDATE ujian_siswa SET status = 'selesai', waktu_selesai = NOW() WHERE id_ujian_siswa = :id");
            $this->db->bind('id', $id_ujian_siswa);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getSoalUjian(string $id_ujian): array
    {
        try {
            $this->db->query(
                'SELECT bs.id_bank_soal, bs.pertanyaan, bs.gambar,
                        bs.ja, bs.jb, bs.jc, bs.jd, bs.answer AS kunci,
                        us.point
                 FROM ujian_soal us
                 JOIN bank_soal bs ON bs.id_bank_soal = us.id_bank_soal
                 WHERE us.id_ujian = :id_ujian
                 ORDER BY bs.created_at ASC'
            );
            $this->db->bind('id_ujian', $id_ujian);
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getJawabanSiswa(string $id_ujian_siswa): array
    {
        try {
            $this->db->query('SELECT id_bank_soal, answer FROM jawaban_siswa WHERE id_ujian_siswa = :id');
            $this->db->bind('id', $id_ujian_siswa);
            $rows = $this->db->resultSet();

            $map = [];
            foreach ($rows as $row) {
                $map[$row['id_bank_soal']] = $row['answer'];
            }
            return $map;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function simpanJawaban(string $id_ujian_siswa, string $id_bank_soal, string $answer)
    {
        try {
            $this->db->query('SELECT id_ujian_siswa FROM jawaban_siswa WHERE id_ujian_siswa = :ius AND id_bank_soal = :ibs LIMIT 1');
            $this->db->bind('ius', $id_ujian_siswa);
            $this->db->bind('ibs', $id_bank_soal);
            $existing = $this->db->single();

            if ($existing) {
                $this->db->query('UPDATE jawaban_siswa SET answer = :answer WHERE id_ujian_siswa = :ius AND id_bank_soal = :ibs');
            } else {
                $this->db->query('INSERT INTO jawaban_siswa (id_ujian_siswa, id_bank_soal, answer) VALUES (:ius, :ibs, :answer)');
            }

            $this->db->bind('ius', $id_ujian_siswa);
            $this->db->bind('ibs', $id_bank_soal);
            $this->db->bind('answer', $answer);
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function hitungNilaiOtomatis(string $id_ujian, string $id_ujian_siswa, string $nisn)
    {
        try {
            $soalList = $this->getSoalUjian($id_ujian);
            $jawabanMap = $this->getJawabanSiswa($id_ujian_siswa);

            $benar = 0;
            $salah = 0;
            $totalPoint = 0;

            foreach ($soalList as $soal) {
                $jawab = $jawabanMap[$soal['id_bank_soal']] ?? null;
                if ($jawab !== null && $jawab === $soal['kunci']) {
                    $benar++;
                    $totalPoint += (int)$soal['point'];
                } else {
                    $salah++;
                }
            }

            $id_nilai = uniqid('ns_', true);
            $this->db->query(
                'INSERT INTO nilai_siswa (id_nilai_siswa, id_ujian, id_ujian_siswa, nisn, total_benar, total_salah, nilai)
                 VALUES (:id_nilai, :id_ujian, :id_ujian_siswa, :nisn, :benar, :salah, :nilai)
                 ON DUPLICATE KEY UPDATE
                    total_benar = :benar2, total_salah = :salah2, nilai = :nilai2, updated_at = NOW()'
            );
            $this->db->bind('id_nilai', $id_nilai);
            $this->db->bind('id_ujian', $id_ujian);
            $this->db->bind('id_ujian_siswa', $id_ujian_siswa);
            $this->db->bind('nisn', $nisn);
            $this->db->bind('benar', (string)$benar);
            $this->db->bind('salah', (string)$salah);
            $this->db->bind('nilai', (string)$totalPoint);
            $this->db->bind('benar2', (string)$benar);
            $this->db->bind('salah2', (string)$salah);
            $this->db->bind('nilai2', (string)$totalPoint);
            $this->db->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}