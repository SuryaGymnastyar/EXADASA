<div class="page-content container">
    <div class="page-header">
        <div>
            <h1 class="page-header__title poppins-semibold">Koreksi &amp; Hasil Ujian</h1>
            <p class="page-header__subtitle poppins-regular">
                Periksa jawaban, beri nilai/feedback, dan publish hasil ke siswa.
            </p>
        </div>
        <?php if ($_SESSION['user']['role'] == 'petugas' || $_SESSION['user']['role'] == 'admin'): ?>
            <div class="page-header__actions">
                <button class="btn-primary poppins-medium">
                    <i class="ph ph-file-xls"></i> Export Excel
                </button>
                <button class="btn-primary poppins-medium">
                    <i class="ph ph-printer"></i> Cetak PDF
                </button>
            </div>
        <?php endif; ?>
    </div>


    <div class="filter-card">
        <div class="filter-card__selects">
            <div class="filter-search">
                <i class="ph ph-magnifying-glass"></i>
                <input type="text" class="poppins-regular" placeholder="Cari siswa..." />
            </div>
            <div class="group-select">
                <div class="select-wrap">
                    <select class="form-select poppins-regular">
                        <option value="">Mata Pelajaran</option>
                        <option>Matematika</option>
                        <option>Fisika</option>
                        <option>Biologi</option>
                        <option>Bahasa Indonesia</option>
                    </select>
                    <i class="ph ph-caret-down select-caret"></i>
                </div>
                <div class="select-wrap">
                    <select class="form-select poppins-regular">
                        <option value="">Kelas</option>
                        <option>XII IPA 1</option>
                        <option>XII IPS 2</option>
                        <option>XI IPA 3</option>
                    </select>
                    <i class="ph ph-caret-down select-caret"></i>
                </div>
            </div>
        </div>
    </div>


    <div class="table-card">
        <div class="table-scroll">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="poppins-medium">Nama Siswa</th>
                        <th class="poppins-medium">Kelas</th>
                        <th class="poppins-medium">Skor</th>
                        <th class="poppins-medium">Benar/Salah</th>
                        <th class="poppins-medium">Waktu Submit</th>
                        <th class="poppins-medium">Status</th>
                        <th class="poppins-medium th-aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $rows = [
                        [1, 'MR', 'M. Rafly Saputra', 'XII IPA 1', 92, 28, 2, '2026-04-20 09:55', 'published', 'av-blue'],
                        [2, 'MS', 'M. Surya Gymnastyar', 'XII IPA 1', 88, 26, 4, '2026-04-20 09:48', 'published', 'av-purple'],
                        [3, 'R', 'Rheal', 'XII IPS 2', 76, 23, 7, '2026-04-20 09:50', 'corrected', 'av-teal'],
                        [4, 'EP', 'Eka Putri', 'XII IPA 1', 95, 29, 1, '2026-04-20 09:42', 'published', 'av-green'],
                    ];
                    ?>

                    <?php foreach ($rows as [$id, $inisial, $nama, $kelas, $skor, $benar, $salah, $submit, $status, $av]): ?>
                        <tr class="data-table__row">

                            <td>
                                <div class="siswa-cell">
                                    <div class="avatar <?= $av ?> poppins-semibold"><?= $inisial ?></div>
                                    <span class="poppins-medium"><?= $nama ?></span>
                                </div>
                            </td>

                            <td class="poppins-regular td-muted"><?= $kelas ?></td>

                            <td>
                                <?php if ($skor !== null): ?>
                                    <strong class="td-skor poppins-semibold"><?= $skor ?></strong>
                                <?php else: ?>
                                    <span class="td-muted">&mdash;</span>
                                <?php endif; ?>
                            </td>

                            <td class="poppins-regular td-muted">
                                <?= $benar !== null ? "$benar / $salah" : '&mdash;' ?>
                            </td>

                            <td class="poppins-regular td-muted"><?= $submit ?></td>

                            <td>
                                <?php if ($status === 'published'): ?>
                                    <span class="badge badge-published poppins-medium">published</span>
                                <?php elseif ($status === 'corrected'): ?>
                                    <span class="badge badge-corrected poppins-medium">corrected</span>
                                <?php elseif ($status === 'pending'): ?>
                                    <span class="badge badge-pending poppins-medium">pending</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="aksi-cell">
                                    <a href="<?= Constant::DIRNAME ?>koreksi/detail/<?= $id ?>" class="icon-btn"
                                        title="Lihat Detail">
                                        <i class="ph ph-eye"></i>
                                    </a>
                                    <?php if ($status === 'published'): ?>
                                        <button class="icon-btn icon-btn--orange" title="Sembunyikan">
                                            <i class="ph ph-eye-slash"></i>
                                        </button>
                                    <?php endif; ?>
                                    <?php if ($status === 'corrected' || $status === 'pending'): ?>
                                        <button class="icon-btn poppins-medium">
                                            <i class="ph ph-paper-plane-tilt"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

    </main>
</div>