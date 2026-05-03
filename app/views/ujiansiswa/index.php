<div class="container ujiansiswa-container">
    <div class="ujiansiswa-header">
        <div class="ujiansiswa-title">
            <h1 class="poppins-bold">Ujian Saya</h1>
            <p class="poppins-regular">Daftar ujian sesuai kelas dan mata pelajaran kamu.</p>
        </div>
        <div class="ujiansiswa-search">
            <div class="search-wrapper">
                <i class="ph ph-magnifying-glass search-icon"></i>
                <input type="text" id="searchUjian" placeholder="Cari ujian..." class="poppins-regular" oninput="filterUjian(this.value)">
            </div>
        </div>
    </div>

    <div class="ujian-grid" id="ujianGrid">

        <div class="ujian-card" data-nama="UTS Matematika" data-mapel="Matematika">
            <div class="card-top">
                <div class="card-icon">
                    <i class="ph ph-clipboard-text"></i>
                </div>
                <span class="badge badge-aktif">Aktif</span>
            </div>
            <div class="card-body">
                <p class="card-mapel poppins-semibold">MATEMATIKA</p>
                <h3 class="card-nama poppins-bold">UTS Matematika</h3>
                <p class="card-kelas poppins-regular">XII IPA 1</p>
                <div class="card-detail">
                    <span class="detail-item">
                        <i class="ph ph-clock"></i> 90 menit
                    </span>
                    <span class="detail-item">
                        <i class="ph ph-clipboard-text"></i> 30 soal
                    </span>
                </div>
                <div class="card-jadwal">
                    <i class="ph ph-calendar-dots"></i>
                    <span class="poppins-regular">2026-05-02 08:00</span>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn-masuk-ujian btn-primary poppins-semibold" onclick="openModal('UTS Matematika', 'MTK-2026')">
                    Masuk Ujian
                </button>
            </div>
        </div>

        <div class="ujian-card" data-nama="Ulangan Harian Fisika" data-mapel="Fisika">
            <div class="card-top">
                <div class="card-icon">
                    <i class="ph ph-clipboard-text"></i>
                </div>
                <span class="badge badge-aktif">Aktif</span>
            </div>
            <div class="card-body">
                <p class="card-mapel card-mapel--fisika poppins-semibold">FISIKA</p>
                <h3 class="card-nama poppins-bold">Ulangan Harian Fisika</h3>
                <p class="card-kelas poppins-regular">XII IPA 1</p>
                <div class="card-detail">
                    <span class="detail-item">
                        <i class="ph ph-clock"></i> 60 menit
                    </span>
                    <span class="detail-item">
                        <i class="ph ph-clipboard-text"></i> 20 soal
                    </span>
                </div>
                <div class="card-jadwal">
                    <i class="ph ph-calendar-dots"></i>
                    <span class="poppins-regular">2026-05-04 09:00</span>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn-lanjutkan btn-primary poppins-semibold" onclick="openModal('Ulangan Harian Fisika', 'FIS-2026')">
                    Lanjutkan
                </button>
            </div>
        </div>

        <div class="ujian-card" data-nama="UAS Bahasa Indonesia" data-mapel="B. Indonesia">
            <div class="card-top">
                <div class="card-icon card-icon--muted">
                    <i class="ph ph-clipboard-text"></i>
                </div>
                <span class="badge badge-berakhir">Berakhir</span>
            </div>
            <div class="card-body">
                <p class="card-mapel card-mapel--indo poppins-semibold">B. INDONESIA</p>
                <h3 class="card-nama poppins-bold">UAS Bahasa Indonesia</h3>
                <p class="card-kelas poppins-regular">XII IPA 1</p>
                <div class="card-detail">
                    <span class="detail-item">
                        <i class="ph ph-clock"></i> 120 menit
                    </span>
                    <span class="detail-item">
                        <i class="ph ph-clipboard-text"></i> 40 soal
                    </span>
                </div>
                <div class="card-jadwal">
                    <i class="ph ph-calendar-dots"></i>
                    <span class="poppins-regular">2026-04-20 08:00</span>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn-lihat-hasil poppins-semibold">
                    Lihat Hasil
                </button>
            </div>
        </div>

        <div class="ujian-card" data-nama="Quiz Kimia" data-mapel="Kimia">
            <div class="card-top">
                <div class="card-icon card-icon--draft">
                    <i class="ph ph-clipboard-text"></i>
                </div>
                <span class="badge badge-draft">Draft</span>
            </div>
            <div class="card-body">
                <p class="card-mapel card-mapel--kimia poppins-semibold">KIMIA</p>
                <h3 class="card-nama poppins-bold">Quiz Kimia</h3>
                <p class="card-kelas poppins-regular">XII IPA 1</p>
                <div class="card-detail">
                    <span class="detail-item">
                        <i class="ph ph-clock"></i> 30 menit
                    </span>
                    <span class="detail-item">
                        <i class="ph ph-clipboard-text"></i> 15 soal
                    </span>
                </div>
                <div class="card-jadwal">
                    <i class="ph ph-calendar-dots"></i>
                    <span class="poppins-regular">2026-05-06 10:00</span>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn-masuk-ujian btn-primary poppins-semibold" disabled>
                    Masuk Ujian
                </button>
            </div>
        </div>

    </div>

    <div class="ujian-empty" id="ujianEmpty" style="display: none;">
        <i class="ph ph-magnifying-glass"></i>
        <p class="poppins-medium">Ujian tidak ditemukan.</p>
    </div>

</div>

<div class="modal-overlay" id="modalOverlay" onclick="closeModalOnOverlay(event)">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="modal-header">
            <div class="modal-title-group">
                <i class="ph ph-key modal-key-icon"></i>
                <h2 class="poppins-bold" id="modalTitle">Kode Akses Ujian</h2>
            </div>
            <button class="modal-close" onclick="closeModal()" aria-label="Tutup modal">
                <i class="ph ph-x"></i>
            </button>
        </div>

        <div class="modal-body">
            <p class="modal-desc poppins-regular">
                Masukkan kode akses untuk memulai ujian <strong id="modalNamaUjian">UTS Matematika</strong>. Kode akan diberikan oleh pengawas.
            </p>

            <div class="form-input">
                <input type="text" id="kodeAkses" placeholder="MISAL: MTK-2026" class="poppins-regular" autocomplete="off">
            </div>

            <div class="modal-warning">
                <span class="warning-icon">⚠️</span>
                <p class="poppins-regular">
                    Setelah mulai, ujian akan masuk mode <strong>fullscreen</strong>. Pastikan koneksi internet stabil.
                </p>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn-secondary poppins-semibold" onclick="closeModal()">Batal</button>
            <button class="btn-primary poppins-semibold" onclick="mulaiUjian()">Mulai Ujian</button>
        </div>
    </div>
</div>

<script>
    function openModal(namaUjian, placeholder) {
        document.getElementById('modalNamaUjian').textContent = namaUjian;
        document.getElementById('kodeAkses').placeholder = 'MISAL: ' + placeholder;
        document.getElementById('kodeAkses').value = '';
        document.getElementById('modalOverlay').classList.add('active');
        document.body.style.overflow = 'hidden';
        setTimeout(() => document.getElementById('kodeAkses').focus(), 300);
    }

    function closeModal() {
        document.getElementById('modalOverlay').classList.remove('active');
        document.body.style.overflow = '';
    }

    function closeModalOnOverlay(e) {
        if (e.target === document.getElementById('modalOverlay')) closeModal();
    }

    function mulaiUjian() {
        const kode = document.getElementById('kodeAkses').value.trim();
        if (!kode) {
            document.getElementById('kodeAkses').classList.add('input-error');
            document.getElementById('kodeAkses').focus();
            return;
        }
        document.getElementById('kodeAkses').classList.remove('input-error');
        alert('Memulai ujian dengan kode: ' + kode);
        closeModal();
    }

    document.getElementById('kodeAkses').addEventListener('input', function () {
        this.classList.remove('input-error');
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeModal();
    });

    function filterUjian(query) {
        const cards = document.querySelectorAll('.ujian-card');
        const q = query.toLowerCase();
        let visible = 0;
        cards.forEach(card => {
            const nama = card.dataset.nama.toLowerCase();
            const mapel = card.dataset.mapel.toLowerCase();
            if (nama.includes(q) || mapel.includes(q)) {
                card.style.display = '';
                visible++;
            } else {
                card.style.display = 'none';
            }
        });
        document.getElementById('ujianEmpty').style.display = visible === 0 ? 'flex' : 'none';
    }
</script>