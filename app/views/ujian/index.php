<?php if ($data['halaman'] == 'index') : ?>
    <div class="container ujian">
        <div class="ujian-header">
            <div class="ujian-title">
                <h1 class="poppins-semibold">Manajemen Ujian</h1>
                <p class="poppins-regular">Buat dan kelola ujian untuk kelas anda.</p>
            </div>
            <a href="<?= Constant::DIRNAME; ?>ujian/tambah" class="btn-primary" style="text-decoration: none; display: flex; align-items: center; gap: 8px;">
                <i class="ph ph-plus"></i>
                Buat Ujian
            </a>
        </div>
        <div class="ujian-table">
            <table>
                <thead>
                    <tr>
                        <th>Nama Ujian</th>
                        <th>Kelas</th>
                        <th>Jadwal</th>
                        <th>Penilaian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <h2 class="poppins-semibold">Ujian Matematika</h2>
                            <div class="ujian-info">
                                <span><i class="ph ph-clock"></i> 90m</span>
                                <span><i class="ph ph-key"></i> ********</span>
                            </div>
                        </td>
                        <td><div>XII IPA 1</div></td>
                        <td><div>2023-05-01 08:00</div></td>
                        <td><span class="manual">Manual</span></td>
                        <td><span class="active">Active</span></td>
                        <td>
                            <div>
                                <button class="btn-edit"><i class="ph ph-pencil"></i></button>
                                <button class="btn-danger"><i class="ph ph-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php elseif ($data['halaman'] == 'tambah') : ?>
    <main class="ujian-container poppins-regular">
        <link rel="stylesheet" href="<?= Constant::DIRNAME ?>css/style.tambah.ujian">
        
        <header class="ujian-header-tambah">
            <div class="header-left">
                <a href="<?= Constant::DIRNAME; ?>ujian" class="btn-back"><i class="ph ph-arrow-left"></i></a>
                <div>
                    <h1>Buat Ujian Baru</h1>
                    <p>Sesuaikan informasi ujian dan bank soal.</p>
                </div>
            </div>
            <div class="header-right">
                <a href="<?= Constant::DIRNAME; ?>ujian" class="btn-batal">Batal</a>
                <button type="submit" form="form-ujian" class="btn-simpan">Simpan Ujian</button>
            </div>
        </header>

        <form id="form-ujian" action="<?= Constant::DIRNAME; ?>ujian/simpan" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_user" value="<?= $_SESSION['user_id'] ?? 1; ?>">

            <section class="ujian-card">
                <div class="card-header">
                    <h3><i class="ph ph-info"></i> Informasi Utama</h3>
                </div>
                <div class="card-body">
                    <div class="form-group-row">
                        <div class="form-input">
                            <label>Nama Ujian</label>
                            <input type="text" name="nama_ujian" required>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-input">
                            <label>Deskripsi Ujian</label>
                            <textarea name="deskripsi_ujian" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-group-grid">
                        <div class="form-input">
                            <label>Kelas</label>
                            <select name="id_kelas" required>
                                <option value="">Pilih Kelas</option>
                                <?php foreach($data['kelas'] as $kls) : ?>
                                    <option value="<?= $kls['id_kelas']; ?>"><?= $kls['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-input">
                            <label>Kode Ujian</label>
                            <input type="text" name="kode_ujian" required>
                        </div>
                    </div>
                    <div class="form-group-grid">
                        <div class="form-input">
                            <label>Jadwal Mulai</label>
                            <input type="datetime-local" name="jadwal_mulai" required>
                        </div>
                        <div class="form-input">
                            <label>Jadwal Selesai</label>
                            <input type="datetime-local" name="jadwal_selesai" required>
                        </div>
                    </div>
                    <div class="form-group-grid">
                        <div class="form-input">
                            <label>Waktu (Menit)</label>
                            <input type="number" name="waktu_pengerjaan" required>
                        </div>
                        <div class="form-input">
                            <label>Penilaian</label>
                            <select name="penilaian">
                                <option value="Otomatis">Otomatis</option>
                                <option value="Manual">Manual</option>
                            </select>
                        </div>
                        <div class="form-input">
                            <label>Status</label>
                            <select name="status">
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            <div class="input-method-selector" style="display: flex; gap: 10px; margin: 25px 0;">
                <button type="button" id="btn-mode-manual" class="btn-tab active" onclick="switchMode('manual')">
                    <i class="ph ph-pencil-simple"></i> Input Manual
                </button>
                <button type="button" id="btn-mode-csv" class="btn-tab" onclick="switchMode('csv')">
                    <i class="ph ph-file-csv"></i> Import CSV
                </button>
            </div>

            <div id="section-manual">
                <div id="soal-container"></div>
                <button type="button" id="btn-tambah-soal" class="btn-tambah-soal">
                    <i class="ph ph-plus-circle"></i> Tambah Pertanyaan
                </button>
            </div>

            <div id="section-csv" style="display: none;">
                <div class="import-csv-box" style="border: 2px dashed #3b82f6; border-radius: 12px; padding: 40px; text-align: center; background: #f8fafc;">
                    <i class="ph ph-cloud-arrow-up" style="font-size: 48px; color: #3b82f6;"></i>
                    <h3 style="margin-top: 15px;">Upload File CSV</h3>
                    <input type="file" name="file_csv" id="file_csv" accept=".csv" style="display: none;">
                    <button type="button" class="btn-simpan" onclick="document.getElementById('file_csv').click()">Pilih File</button>
                    <div id="csv-file-name" style="margin-top: 10px; color: #10b981;"></div>
                </div>
            </div>
        </form>
    </main>

    <template id="template-soal">
        <div class="ujian-card soal-item">
            <div class="card-header-soal">
                <span class="nomor-label">Soal #1</span>
                <button type="button" class="btn-remove-soal" onclick="hapusSoal(this)"><i class="ph ph-trash"></i></button>
            </div>
            <div class="card-body">
                <div class="form-input" style="margin-bottom: 15px;">
                    <label>Pertanyaan</label>
                    <textarea name="soal_text[]" rows="2" required></textarea>
                </div>
                <div class="form-input" style="margin-bottom: 15px;">
                    <label><i class="ph ph-image"></i> Gambar (Opsional)</label>
                    <input type="file" name="soal_gambar[]" accept="image/*">
                </div>
                <div class="options-grid">
                    <?php foreach(['A','B','C','D'] as $opt) : ?>
                        <div class="option-row">
                            <input type="radio" name="jawaban_benar[INDEX]" value="<?= $opt ?>" required>
                            <input type="text" name="opsi_<?= strtolower($opt) ?>[]" placeholder="Opsi <?= $opt ?>" required>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </template>

    <script>
        const container = document.getElementById('soal-container');
        const template = document.getElementById('template-soal');
        const btnTambah = document.getElementById('btn-tambah-soal');

        btnTambah.onclick = () => {
            const clone = template.content.cloneNode(true);
            container.appendChild(clone);
            aturUlangNomor();
        };

        function aturUlangNomor() {
            container.querySelectorAll('.soal-item').forEach((soal, index) => {
                soal.querySelector('.nomor-label').innerText = `Soal #${index + 1}`;
                soal.querySelectorAll('input[type="radio"]').forEach(r => r.name = `jawaban_benar[${index}]`);
            });
        }

        function hapusSoal(btn) {
            if (confirm('Hapus soal ini?')) { 
                btn.closest('.soal-item').remove(); 
                aturUlangNomor(); 
            }
        }

        function switchMode(mode) {
            document.getElementById('section-manual').style.display = mode === 'manual' ? 'block' : 'none';
            document.getElementById('section-csv').style.display = mode === 'csv' ? 'block' : 'none';
            document.getElementById('btn-mode-manual').classList.toggle('active', mode === 'manual');
            document.getElementById('btn-mode-csv').classList.toggle('active', mode === 'csv');
        }

        document.getElementById('file_csv').onchange = function() {
            document.getElementById('csv-file-name').innerText = "File terpilih: " + this.files[0].name;
        };

        window.onload = () => { if(container.children.length === 0) btnTambah.click(); };
    </script>
<?php endif; ?>