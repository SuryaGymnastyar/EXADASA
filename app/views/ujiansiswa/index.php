<?php

$listUjian = $data['listUjian']  ?? [];
$statusMap = $data['statusMap']  ?? [];
$DIRNAME   = Constant::DIRNAME;
$now       = time();
?>

<div class="container ujiansiswa-container">

    <div class="ujiansiswa-header">
        <div class="ujiansiswa-title">
            <h1 class="poppins-bold">Ujian Saya</h1>
            <p class="poppins-regular">Daftar ujian sesuai kelas dan mata pelajaran kamu.</p>
        </div>
        <div class="ujiansiswa-search">
            <div class="search-wrapper">
                <i class="ph ph-magnifying-glass search-icon"></i>
                <input type="text" id="searchUjian"
                       placeholder="Cari ujian..."
                       class="poppins-regular"
                       oninput="filterUjian(this.value)">
            </div>
        </div>
    </div>

    <div class="ujian-grid" id="ujianGrid">

        <?php if (empty($listUjian)): ?>
            <div class="ujian-empty" id="ujianEmpty" style="grid-column: 1/-1; display: flex;">
                <i class="ph ph-clipboard-text"></i>
                <p class="poppins-medium">Belum ada ujian yang tersedia.</p>
            </div>

        <?php else: ?>
            <?php foreach ($listUjian as $ujian):
                $id_ujian    = $ujian['id_ujian'];
                $namaUjian   = htmlspecialchars($ujian['nama_ujian']);
                $mapelLabel  = htmlspecialchars($ujian['deskripsi_ujian'] ?? '-');
                $jadwalMulai = $ujian['jadwal_mulai'];
                $jadwalSels  = $ujian['jadwal_selesai'];
                $waktu       = $ujian['waktu_pengerjaan'];

                $wParts   = explode(':', $waktu);
                $menitTotal = ((int)$wParts[0]) * 60 + (int)$wParts[1];

                $tsMulai = strtotime($jadwalMulai);
                $tsSels  = strtotime($jadwalSels);
                $pengerjaanStatus = $statusMap[$id_ujian] ?? null;

                if ($pengerjaanStatus === 'selesai') {
                    $badgeClass = 'badge-berakhir';
                    $badgeLabel = 'Selesai';
                    $iconClass  = 'card-icon--muted';
                } elseif ($now < $tsMulai) {
                    $badgeClass = 'badge-draft';
                    $badgeLabel = 'Belum Mulai';
                    $iconClass  = 'card-icon--draft';
                } elseif ($now > $tsSels) {
                    $badgeClass = 'badge-berakhir';
                    $badgeLabel = 'Berakhir';
                    $iconClass  = 'card-icon--muted';
                } else {
                    $badgeClass = 'badge-aktif';
                    $badgeLabel = 'Aktif';
                    $iconClass  = '';
                }

                $bisaMasuk = ($now >= $tsMulai && $now <= $tsSels && $pengerjaanStatus !== 'selesai');
            ?>

            <div class="ujian-card"
                 data-nama="<?= strtolower($namaUjian) ?>"
                 data-mapel="<?= strtolower($mapelLabel) ?>">

                <div class="card-top">
                    <div class="card-icon <?= $iconClass ?>">
                        <i class="ph ph-clipboard-text"></i>
                    </div>
                    <span class="badge <?= $badgeClass ?> poppins-semibold"><?= $badgeLabel ?></span>
                </div>

                <div class="card-body">
                    <p class="card-mapel poppins-semibold">
                        <?= strtoupper($mapelLabel) ?>
                    </p>
                    <h3 class="card-nama poppins-bold"><?= $namaUjian ?></h3>

                    <div class="card-detail">
                        <span class="detail-item poppins-regular">
                            <i class="ph ph-clock"></i>
                            <?= $menitTotal ?> menit
                        </span>
                        <span class="detail-item poppins-regular">
                            <i class="ph ph-key"></i>
                            Kode diperlukan
                        </span>
                    </div>

                    <div class="card-jadwal poppins-regular">
                        <i class="ph ph-calendar-dots"></i>
                        <?= date('d M Y H:i', $tsMulai) ?>
                    </div>
                </div>

                <div class="card-footer">
                    <?php if ($pengerjaanStatus === 'selesai'): ?>
                        <a href="<?= $DIRNAME ?>hasilUjian"
                           class="card-footer__btn btn-lihat-hasil poppins-semibold"
                           style="text-decoration:none; text-align:center;">
                            Lihat Hasil
                        </a>

                    <?php elseif ($pengerjaanStatus === 'proses'): ?>
                        <button class="card-footer__btn btn-lanjutkan poppins-semibold"
                                onclick="bukaModalKode(
                                    '<?= $id_ujian ?>',
                                    '<?= addslashes($namaUjian) ?>'
                                )">
                            <i class="ph ph-play"></i> Lanjutkan
                        </button>

                    <?php elseif ($bisaMasuk): ?>
                        <button class="card-footer__btn btn-masuk-ujian poppins-semibold"
                                onclick="bukaModalKode(
                                    '<?= $id_ujian ?>',
                                    '<?= addslashes($namaUjian) ?>'
                                )">
                            Masuk Ujian
                        </button>

                    <?php elseif ($now < $tsMulai): ?>
                        <button class="card-footer__btn btn-masuk-ujian poppins-semibold" disabled>
                            Belum Dimulai
                        </button>

                    <?php else: ?>
                        <button class="card-footer__btn btn-masuk-ujian poppins-semibold" disabled>
                            Sudah Berakhir
                        </button>
                    <?php endif; ?>
                </div>
            </div>

            <?php endforeach; ?>
        <?php endif; ?>

    </div>

    <div class="ujian-empty" id="ujianEmpty" style="display: none;">
        <i class="ph ph-magnifying-glass"></i>
        <p class="poppins-medium">Ujian tidak ditemukan.</p>
    </div>

</div>


<div class="modal-overlay" id="modalOverlay" onclick="tutupModalKodeOnOverlay(event)">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="modalTitleKode">

        <div class="modal-header">
            <div class="modal-title-group">
                <i class="ph ph-key modal-key-icon"></i>
                <h2 class="poppins-bold" id="modalTitleKode">Kode Akses Ujian</h2>
            </div>
            <button class="modal-close" onclick="tutupModalKode()" aria-label="Tutup modal">
                <i class="ph ph-x"></i>
            </button>
        </div>

        <div class="modal-body">
            <p class="modal-desc poppins-regular">
                Masukkan kode akses untuk memulai ujian
                <strong id="modalNamaUjian">—</strong>.
                Kode akan diberikan oleh pengawas.
            </p>

            <div class="form-input" style="position: relative;">
                <input type="text"
                       id="inputKodeAkses"
                       placeholder="Contoh: DEMO-2026"
                       class="poppins-regular"
                       autocomplete="off"
                       style="text-transform: uppercase;"
                       oninput="this.classList.remove('input-error'); document.getElementById('pesanError').textContent = ''">
            </div>

            <p id="pesanError"
               style="font-size: 13px; color: #ef4444; margin-top: 4px; min-height: 18px;"
               class="poppins-regular"></p>

            <div class="modal-warning">
                <span class="warning-icon">⚠️</span>
                <p class="poppins-regular">
                    Setelah mulai, ujian akan masuk mode
                    <strong>fullscreen</strong>.
                    Pastikan koneksi internet stabil.
                </p>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn-secondary poppins-semibold" onclick="tutupModalKode()">Batal</button>
            <button class="btn-primary poppins-semibold" id="btnMulaiUjian" onclick="submitKode()">
                <span id="btnMulaiLabel">Mulai Ujian</span>
                <span id="btnMulaiLoader" style="display:none;">
                    <i class="ph ph-circle-notch" style="animation: spin 0.8s linear infinite; display:inline-block;"></i>
                </span>
            </button>
        </div>

        <input type="hidden" id="hiddenIdUjianModal">
        <input type="hidden" id="hiddenDirnameModal" value="<?= Constant::DIRNAME ?>">
    </div>
</div>

<style>
@keyframes spin { to { transform: rotate(360deg); } }

.card-footer__btn {
    width: 100%;
    padding: 11px 20px;
    border-radius: 12px;
    font-size: 0.92rem;
    cursor: pointer;
    transition: all 0.25s ease;
    font-family: "Poppins", sans-serif;
    border: none;
    display: block;
    text-align: center;
}

.card-footer__btn.btn-masuk-ujian {
    background: var(--color-gradient-primary);
    color: #fff;
}

.card-footer__btn.btn-masuk-ujian:hover:not(:disabled) {
    opacity: 0.88;
    transform: translateY(-1px);
}

.card-footer__btn.btn-masuk-ujian:disabled {
    opacity: 0.45;
    cursor: not-allowed;
    transform: none;
}

.card-footer__btn.btn-lanjutkan {
    background: linear-gradient(135deg, #f97316, #ea580c);
    color: #fff;
}

.card-footer__btn.btn-lanjutkan:hover {
    opacity: 0.88;
    transform: translateY(-1px);
}

.card-footer__btn.btn-lihat-hasil {
    background: transparent;
    color: var(--color-foreground);
    border: 1.5px solid #d0d9e6;
}

.card-footer__btn.btn-lihat-hasil:hover {
    background: #f1f5f9;
    border-color: #b0bccc;
}
</style>

<script>
const DIRNAME_US = document.getElementById('hiddenDirnameModal').value;

function bukaModalKode(idUjian, namaUjian) {
    document.getElementById('hiddenIdUjianModal').value = idUjian;
    document.getElementById('modalNamaUjian').textContent = namaUjian;
    document.getElementById('inputKodeAkses').value = '';
    document.getElementById('inputKodeAkses').classList.remove('input-error');
    document.getElementById('pesanError').textContent = '';
    resetBtnMulai();
    document.getElementById('modalOverlay').classList.add('active');
    document.body.style.overflow = 'hidden';
    setTimeout(() => document.getElementById('inputKodeAkses').focus(), 280);
}

function tutupModalKode() {
    document.getElementById('modalOverlay').classList.remove('active');
    document.body.style.overflow = '';
}

function tutupModalKodeOnOverlay(e) {
    if (e.target === document.getElementById('modalOverlay')) tutupModalKode();
}

function resetBtnMulai() {
    document.getElementById('btnMulaiLabel').style.display = '';
    document.getElementById('btnMulaiLoader').style.display = 'none';
    document.getElementById('btnMulaiUjian').disabled = false;
}

function setLoading(on) {
    document.getElementById('btnMulaiLabel').style.display  = on ? 'none' : '';
    document.getElementById('btnMulaiLoader').style.display = on ? '' : 'none';
    document.getElementById('btnMulaiUjian').disabled = on;
}

async function submitKode() {
    const kode     = document.getElementById('inputKodeAkses').value.trim().toUpperCase();
    const idUjian  = document.getElementById('hiddenIdUjianModal').value;
    const inputEl  = document.getElementById('inputKodeAkses');
    const errorEl  = document.getElementById('pesanError');

    if (!kode) {
        inputEl.classList.add('input-error');
        inputEl.focus();
        errorEl.textContent = 'Kode tidak boleh kosong.';
        return;
    }

    setLoading(true);

    try {
        const res = await fetch(DIRNAME_US + 'ujianSiswa/cekKode', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id_ujian: idUjian, kode: kode })
        });
        const data = await res.json();

        if (data.success) {
            window.location.href = data.redirect;
        } else {
            inputEl.classList.add('input-error');
            errorEl.textContent = data.message || 'Kode salah, coba lagi.';
            inputEl.focus();
            resetBtnMulai();
        }
    } catch (err) {
        errorEl.textContent = 'Terjadi kesalahan jaringan. Coba lagi.';
        resetBtnMulai();
    }
}

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') tutupModalKode();
    if (e.key === 'Enter' && document.getElementById('modalOverlay').classList.contains('active')) {
        submitKode();
    }
});

function filterUjian(query) {
    const cards = document.querySelectorAll('#ujianGrid .ujian-card');
    const q     = query.toLowerCase().trim();
    let visible = 0;

    cards.forEach(card => {
        const nama  = card.dataset.nama  || '';
        const mapel = card.dataset.mapel || '';
        const match = !q || nama.includes(q) || mapel.includes(q);
        card.style.display = match ? '' : 'none';
        if (match) visible++;
    });

    const emptyEl = document.getElementById('ujianEmpty');
    if (emptyEl) emptyEl.style.display = (visible === 0 && q) ? 'flex' : 'none';
}
</script>