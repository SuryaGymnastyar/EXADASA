<div class="page-content container">
    <div class="page-header">
        <div>
            <h1 class="page-header__title poppins-semibold">Live Monitoring</h1>
            <p class="page-header__subtitle poppins-regular">
                Pantau siswa yang sedang mengerjakan ujian secara real-time.
            </p>
        </div>
    </div>

    <div class="stats-grid">

        <div class="stats-card">
            <div class="stats-card__info">
                <p class="stats-card__label poppins-medium">SEDANG UJIAN</p>
                <h2 class="stats-card__number poppins-semibold">4</h2>
            </div>
            <div class="stats-card__icon icon-blue">
                <i class="ph ph-eye"></i>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-card__info">
                <p class="stats-card__label poppins-medium">ONLINE</p>
                <h2 class="stats-card__number poppins-semibold">3</h2>
            </div>
            <div class="stats-card__icon icon-teal">
                <i class="ph ph-users-three"></i>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-card__info">
                <p class="stats-card__label poppins-medium">PELANGGARAN</p>
                <h2 class="stats-card__number poppins-semibold">2</h2>
            </div>
            <div class="stats-card__icon icon-orange">
                <i class="ph ph-shield-warning"></i>
            </div>
        </div>

    </div>

    <?php
    $siswa_monitoring = [
        [
            'inisial'     => 'MR',
            'nama'        => 'M. Rafly Saputra',
            'kelas'       => 'XII IPA 1',
            'status'      => 'online',
            'progress'    => 18,
            'total'       => 30,
            'pelanggaran' => null,
            'av'          => 'av-blue',
        ],
        [
            'inisial'     => 'MS',
            'nama'        => 'M. Surya Gymnastyar',
            'kelas'       => 'XII IPA 1',
            'status'      => 'online',
            'progress'    => 25,
            'total'       => 30,
            'pelanggaran' => 'Keluar halaman 1x',
            'av'          => 'av-purple',
        ],
        [
            'inisial'     => 'R',
            'nama'        => 'Rheal',
            'kelas'       => 'XII IPA 1',
            'status'      => 'offline',
            'progress'    => 8,
            'total'       => 30,
            'pelanggaran' => 'Keluar halaman 3x',
            'av'          => 'av-teal',
        ],
        [
            'inisial'     => 'AA',
            'nama'        => 'Andhika Akbar',
            'kelas'       => 'XII IPA 1',
            'status'      => 'online',
            'progress'    => 30,
            'total'       => 30,
            'pelanggaran' => null,
            'av'          => 'av-green',
        ],
    ];
    ?>

    <div class="student-grid">
        <?php foreach ($siswa_monitoring as $s):
            $pct = ($s['total'] > 0) ? round(($s['progress'] / $s['total']) * 100) : 0;
        ?>
        <div class="student-card">

            <div class="student-card__header">
                <div class="siswa-cell">
                    <div class="avatar <?= $s['av'] ?> poppins-semibold"><?= $s['inisial'] ?></div>
                    <div>
                        <p class="student-card__name poppins-semibold"><?= $s['nama'] ?></p>
                        <p class="student-card__kelas poppins-regular"><?= $s['kelas'] ?></p>
                    </div>
                </div>

                <?php if ($s['status'] === 'online'): ?>
                    <span class="status-online poppins-medium">
                        <i class="ph ph-wifi-high"></i> Online
                    </span>
                <?php else: ?>
                    <span class="status-offline poppins-medium">
                        <i class="ph ph-wifi-slash"></i> Offline
                    </span>
                <?php endif; ?>
            </div>

            <div class="student-card__progress">
                <div class="progress-meta">
                    <span class="poppins-regular">Progress</span>
                    <span class="progress-count poppins-semibold"><?= $s['progress'] ?>/<?= $s['total'] ?></span>
                </div>
                <div class="progress-bar">
                    <div class="progress-bar__fill" style="width: <?= $pct ?>%"></div>
                </div>
            </div>

            <?php if ($s['pelanggaran'] !== null): ?>
            <div class="student-card__warning">
                <i class="ph ph-warning"></i>
                <span class="poppins-medium"><?= $s['pelanggaran'] ?></span>
            </div>
            <?php endif; ?>

        </div>
        <?php endforeach; ?>
    </div>
