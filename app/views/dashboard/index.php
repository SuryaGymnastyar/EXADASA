<div class="container dashboard-container">
    <?php if ($_SESSION['user']['role'] == 'siswa'): ?>
        <div class="dashboard-banner">
            <div class="banner-content">
                <p class="banner-sapaan">Selamat pagi 👋</p>
                <h1 class="banner-user">Halo, <?= $data['user_siswa']['nama_lengkap'] ?? 'Siswa'; ?></h1>
                <p class="banner-description">Kamu punya <strong><?= $data['statistik']['ujian_hari_ini'] ?? 0; ?> ujian aktif</strong> hari ini. Tetap fokus dan semangat!</p>
                <button class="btn-lihat-ujian poppins-medium" onclick="window.location.href='<?= Constant::DIRNAME ?>ujian'">Lihat Ujian Saya <i class="ph ph-arrow-right"></i></button>
            </div>

            <div class="banner-info">
                <?php if (!empty($data['ujian_mendatang'])): ?>
                    <p class="info-label">UJIAN BERIKUTNYA</p>
                    <h3 class="info-title"><?= $data['ujian_mendatang']['nama_ujian']; ?></h3>
                    <p class="info-tanggal">
                        <i class="ph ph-calendar-dots"></i> <?= $data['ujian_mendatang']['jadwal_mulai']; ?>
                    </p>

                    <div class="countdown-container" data-target="<?= $data['ujian_mendatang']['jadwal_mulai']; ?>">
                        <div class="countdown-box">
                            <span class="countdown-number" id="days">00</span>
                            <span class="countdown-label">HARI</span>
                        </div>
                        <div class="countdown-box">
                            <span class="countdown-number" id="hours">00</span>
                            <span class="countdown-label">JAM</span>
                        </div>
                        <div class="countdown-box">
                            <span class="countdown-number" id="minutes">00</span>
                            <span class="countdown-label">MENIT</span>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="info-label">UJIAN BERIKUTNYA</p>
                    <h3 class="info-title">Tidak ada jadwal terdekat</h3>
                <?php endif; ?>
            </div>
        </div>

        <?php /* //
        <div class="dashboard-banner">
            <div class="banner-content">
                <p class="banner-sapaan">Selamat pagi 👋</p>
                <h1 class="banner-user">Halo, M. Surya Gymnastyar</h1>
                <p class="banner-description">Kamu punya <strong>2 ujian aktif</strong> minggu ini. Tetap fokus dan semangat!</p>
                <button class="btn-lihat-ujian poppins-medium">Lihat Ujian Saya <i class="ph ph-arrow-right"></i></button>
            </div>
            <div class="banner-info">
                <p class="info-label">UJIAN BERIKUTNYA</p>
                <h3 class="info-title">UTS Matematika</h3>
                <p class="info-tanggal"><i class="ph ph-calendar-dots"></i> 2026-05-02 08:00</p>
                <div class="countdown-container">
                    <div class="countdown-box"><span class="countdown-number">01</span><span class="countdown-label">HARI</span></div>
                    <div class="countdown-box"><span class="countdown-number">12</span><span class="countdown-label">JAM</span></div>
                    <div class="countdown-box"><span class="countdown-number">30</span><span class="countdown-label">MENIT</span></div>
                </div>
            </div>
        </div>
        // */ ?>

    <?php elseif ($_SESSION['user']['role'] == 'petugas'): ?>
        <div class="dashboard-title">
            <h1 class="poppins-semibold">Dashboard Petugas</h1>
            <p class="poppins-regular">Kelola koreksi ujian, cek hasil siswa, dan publish nilai dari sini.</p>
        </div>
    <?php else: ?>
        <div class="dashboard-title">
            <h1 class="poppins-semibold">Dashboard Admin</h1>
            <p class="poppins-regular">Ringkasan sistem & aktivitas seluruh pengguna.</p>
        </div>
    <?php endif; ?>

    <div class="dashboard-stats">
        <?php if ($_SESSION['user']['role'] == 'admin'): ?>
            <div class="stats-card">
                <div class="stats-info">
                    <p class="stats-label">TOTAL PETUGAS</p>
                    <h2 class="stats-number">4</h2>
                </div>
                <div class="stats-icon icon-cyan">
                    <i class="ph ph-user-gear"></i>
                </div>
            </div>
            <div class="stats-card">
                <div class="stats-info">
                    <p class="stats-label">TOTAL KELAS</p>
                    <h2 class="stats-number">1</h2>
                </div>
                <div class="stats-icon icon-orange">
                    <i class="ph ph-graduation-cap"></i>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($_SESSION['user']['role'] == 'petugas' || $_SESSION['user']['role'] == 'admin'): ?>
            <div class="stats-card">
                <div class="stats-info">
                    <p class="stats-label">TOTAL SISWA</p>
                    <h2 class="stats-number">4</h2>
                </div>
                <div class="stats-icon icon-blue">
                    <i class="ph ph-user"></i>
                </div>
            </div>
            <div class="stats-card">
                <div class="stats-info">
                    <p class="stats-label">TOTAL UJIAN</p>
                    <h2 class="stats-number">4</h2>
                </div>
                <div class="stats-icon icon-blue">
                    <i class="ph ph-files"></i>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($_SESSION['user']['role'] == 'siswa'): ?>
            <div class="stats-card">
                <div class="stats-info">
                    <p class="stats-label">UJIAN SELESAI</p>
                    <h2 class="stats-number"><?= $data['statistik']['ujian_selesai'] ?? 0 ?></h2>
                </div>
                <div class="stats-icon icon-green">
                    <i class="ph ph-trophy"></i>
                </div>
            </div>
        <?php endif; ?>

        <div class="stats-card">
            <div class="stats-info">
                <p class="stats-label">UJIAN HARI INI</p>
                <h2 class="stats-number"><?= $data['statistik']['ujian_hari_ini'] ?? 1 ?></h2>
            </div>
            <div class="stats-icon icon-orange">
                <i class="ph ph-clock"></i>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-info">
                <p class="stats-label">PENGUMUMAN</p>
                <h2 class="stats-number"><?= count($data['pengumuman'] ?? []) ?></h2>
            </div>
            <div class="stats-icon icon-cyan">
                <i class="ph ph-megaphone"></i>
            </div>
        </div>
    </div>

    <?php if ($_SESSION['user']['role'] == 'admin'): ?>
        <div class="dashboard-bottom-log">
            <div class="title">
                <h2 class="poppins-semibold">Aktivitas Terbaru</h2>
                <p class="poppins-medium">Real-Time</p>
            </div>
            <div class="log-list">
                <div class="log-item">
                    <div class="img"><span>R</span></div>
                    <div><h4 class="poppins-medium">Rafly - <span style="color: var(--color-primary); font-weight: 500; font-size: 13px;">Submit</span></h4><p>UAS Matematika</p></div>
                    <p class="poppins-regular" style="margin-left: auto;">2026-05-02 08:00</p>
                </div>
                <div class="log-item">
                    <div class="img"><span>R</span></div>
                    <div><h4 class="poppins-medium">Rafly - <span style="color: var(--color-primary); font-weight: 500; font-size: 13px;">Login</span></h4><p>Masuk ke dashboard</p></div>
                    <p class="poppins-regular" style="margin-left: auto;">2026-05-02 08:00</p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($_SESSION['user']['role'] == 'siswa' || $_SESSION['user']['role'] == 'petugas'): ?>
        <div class="dashboard-bottom-content">
            <div class="dashboard-upcoming-exam">
                <div class="upcoming-exam-header">
                    <h2>Ujian Hari Ini</h2>
                    <a href="<?= Constant::DIRNAME ?>ujian" class="btn-lihat-semua">Lihat Semua</a>
                </div>

                <div class="upcoming-exam-list">
                    <?php if (empty($data['list_ujian'])): ?>
                        <p style="padding: 20px; color: #64748b;">Tidak ada ujian untuk hari ini.</p>
                    <?php else: ?>
                        <?php foreach ($data['list_ujian'] as $ujian): ?>
                            <div class="exam-card">
                                <div class="exam-icon"><i class="ph ph-book" style="color: var(--color-primary);"></i></div>
                                <div class="exam-info">
                                    <h4><?= $ujian['nama_ujian'] ?></h4>
                                    <p>Ujian • <?= $ujian['waktu_pengerjaan'] ?> menit • <?= $ujian['jadwal_mulai'] ?></p>
                                </div>
                                <?php if ($_SESSION['user']['role'] == 'siswa'): ?>
                                    <?php 
                                        $now = time();
                                        $selesai = strtotime($ujian['jadwal_selesai']);
                                        if ($now > $selesai):
                                    ?>
                                        <span class="status-badge status-selesai">Selesai</span>
                                    <?php else: ?>
                                        <span class="status-badge status-belum">Belum</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="dashboard-announcements">
                <h2>Pengumuman</h2>
                <div class="announcements-list">
                    <?php if (empty($data['pengumuman'])): ?>
                         <p style="padding: 20px; color: #64748b;">Belum ada pengumuman.</p>
                    <?php else: ?>
                        <?php foreach ($data['pengumuman'] as $p): ?>
                            <div class="announcement-card">
                                <span class="announcement-date"><?= date('Y-m-d', strtotime($p['created_at'])) ?></span>
                                <h4><?= $p['title'] ?></h4>
                                <p><?= $p['deskripsi'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php /* //
        <div class="dashboard-bottom-content">
            <div class="dashboard-upcoming-exam">
                <div class="upcoming-exam-header">
                    <h2jian Hari Ini</h2>
                    <a href="#" class="btn-lihat-semua">Lihat Semua</a>
                </div>
                <div class="upcoming-exam-list">
                    <div class="exam-card">
                        <div class="exam-icon"><i class="ph ph-book" style="color: var(--color-primary);"></i></div>
                        <div class="exam-info">
                            <h4>UTS Matematika</h4>
                            <p>Matematika • 90 menit • 2026-05-02 08:00</p>
                        </div>
                        <span class="status-badge status-belum">Belum</span>
                    </div>
                </div>
            </div>
            <div class="dashboard-announcements">
                <h2>Pengumuman</h2>
                <div class="announcements-list">
                    <div class="announcement-card">
                        <span class="announcement-date">2026-04-28</span>
                        <h4>UTS Semester Genap Dimulai 12 Mei</h4>
                        <p>Persiapkan diri kalian, jangan lupa membawa kartu peserta.</p>
                    </div>
                </div>
            </div>
        </div>
        // */ ?>

    <?php endif; ?>

    <?php if ($_SESSION['user']['role'] == 'petugas'): ?>
        <div class="dashboard-bottom-content" style="margin-top: 20px;">
            <div class="dashboard-upcoming-exam">
                <div class="upcoming-exam-header">
                    <h2>Koreksi Ujian</h2>
                    <a href="<?= Constant::DIRNAME ?>koreksi" class="btn-lihat-semua">Buka Koreksi</a>
                </div>
                <div class="upcoming-exam-list">
                    <div class="exam-card">
                        <div class="exam-icon"><i class="ph ph-note-pencil" style="color: var(--color-primary);"></i></div>
                        <div class="exam-info">
                            <h4>Ujian Matematika</h4>
                            <p>28 jawaban menunggu koreksi • XII IPA 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    function updateCountdown() {
        const container = document.querySelector('.countdown-container');
        if (!container) return;
        const targetDate = new Date(container.getAttribute('data-target')).getTime();
        const now = new Date().getTime();
        const gap = targetDate - now;

        if (gap <= 0) {
            container.innerHTML = "<p style='color: white; font-weight: bold;'>Ujian Sedang Berlangsung!</p>";
            return;
        }

        const second = 1000, minute = second * 60, hour = minute * 60, day = hour * 24;
        const d = Math.floor(gap / day), h = Math.floor((gap % day) / hour), m = Math.floor((gap % hour) / minute);

        document.getElementById('days').innerText = d.toString().padStart(2, '0');
        document.getElementById('hours').innerText = h.toString().padStart(2, '0');
        document.getElementById('minutes').innerText = m.toString().padStart(2, '0');
    }
    setInterval(updateCountdown, 1000);
    updateCountdown();
</script>