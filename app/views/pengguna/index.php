<div class="container pengguna">
    <div class="pengguna-header">
        <div class="pengguna-title">
            <h1 class="poppins-semibold">Manajemen pengguna</h1>
            <p class="poppins-regular">Buat akun siswa & petugas, atur kelas, reset password.</p>
        </div>
        <button class="btn-primary" id="btnTambahPengguna">
            <i class="ph ph-plus"></i>
            Tambah pengguna
        </button>
    </div>

    <div class="card-search">
        <div class="card">
            <div class="filter-search">
                <i class="ph ph-magnifying-glass"></i>
                <input type="text" class="poppins-regular" placeholder="Cari siswa..." />
            </div>
            <div class="select-wrap">
                <select id="select-role" class="form-select poppins-regular">
                    <option value="">Semua Role</option>
                    <option value="admin">Admin</option>
                    <option value="siswa">Siswa</option>
                    <option value="petugas">Petugas</option>
                </select>
                <i class="ph ph-caret-down select-caret"></i>
            </div>
        </div>
    </div>


    <!-- DATA SISWA -->
    <div id="table-siswa" class="ujian-table">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nisn</th>
                    <th>Role</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($data['siswa']) > 0): ?>
                    <?php foreach ($data["siswa"] as $siswa): ?>
                        <tr>
                            <td>
                                <div class="info-name">
                                    <div class="img" style="text-transform: uppercase;">
                                        <?= $siswa['nama_lengkap'][0] ?>
                                    </div>
                                    <div class="info">
                                        <p style="font-weight: 600; color: #000; font-size: 0.9rem;">
                                            <?= $siswa['nama_lengkap'] ?>
                                        </p>
                                        <p style="font-size: 0.7rem;"><?= $siswa['email'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?= $siswa['nisn'] ?>
                            </td>
                            <td>
                                <span><?= $siswa['role'] ?></span>
                            </td>
                            <td>
                                <?= $siswa['kelas'] . " " . $siswa['jurusan'] ?>
                            </td>
                            <td>
                                <div>
                                    <button class="btn-danger">
                                        <i class="ph ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center; font-weight: 600; font-size: 18px;">Data siswa tidak ada
                            <i class="ph ph-magnifying-glass"></i>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div id="table-petugas" class="ujian-table">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nip</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($data['petugas']) > 0): ?>
                    <?php foreach ($data['petugas'] as $petugas): ?>
                        <tr>
                            <td>
                                <div class="info-name">
                                    <div class="img" style="text-transform: uppercase;">
                                        <?= $petugas['nama_lengkap'][0] ?>
                                    </div>
                                    <div class="info">
                                        <p style="font-weight: 600; color: #000; font-size: 0.9rem;">
                                            <?= $petugas['nama_lengkap'] ?>
                                        </p>
                                        <p style="font-size: 0.7rem;"><?= $petugas['email'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?= $petugas['nip'] ?>
                            </td>
                            <td>
                                <span><?= $petugas['role'] ?></span>
                            </td>
                            <td>
                                <div>
                                    <button class="btn-danger">
                                        <i class="ph ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center; font-weight: 600; font-size: 18px;">Data petugas tidak ada
                            <i class="ph ph-magnifying-glass"></i>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- DATA ADMIN -->
    <div id="table-admin" class="ujian-table">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($data['admin']) > 0): ?>
                    <?php foreach ($data['admin'] as $admin): ?>
                        <tr>
                            <td>
                                <div class="info-name">
                                    <div class="img" style="text-transform: uppercase;">
                                        <?= $admin['username'][0] ?>
                                    </div>
                                    <div class="info">
                                        <p style="font-weight: 600; color: #000; font-size: 0.9rem;">
                                            <?= $admin['username'] ?>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?= $admin['username'] ?>
                            </td>
                            <td>
                                <span><?= $admin['role'] ?></span>
                            </td>
                            <td>
                                <div>
                                    <button class="btn-danger">
                                        <i class="ph ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center; font-weight: 600; font-size: 18px;">Data admin tidak ada
                                <i class="ph ph-magnifying-glass"></i>
                            </td>
                        </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- MODAL REGISTRASI -->
    <div class="modal-overlay" id="modalRegistrasi">
        <div class="modal-container">
            <button class="modal-close" id="closeModal">
                <i class="ph ph-x"></i>
            </button>
            <div class="modal-header">
                <h2 class="poppins-bold">Tambah Pengguna</h2>
                <p class="poppins-regular">Pilih metode pendaftaran pengguna</p>
            </div>

            <div class="modal-tabs">
                <button type="button" class="tab-btn active" data-tab="siswa-manual">
                    <i class="ph ph-user-plus"></i>
                    Siswa Manual
                </button>
                <button type="button" class="tab-btn" data-tab="siswa-csv">
                    <i class="ph ph-file-csv"></i>
                    Via CSV
                </button>
                <button type="button" class="tab-btn" data-tab="petugas">
                    <i class="ph ph-user-gear"></i>
                    Petugas
                </button>
                <button type="button" class="tab-btn" data-tab="admin">
                    <i class="ph ph-shield-check"></i>
                    Admin
                </button>
            </div>

            <form action="<?= Constant::DIRNAME ?>pengguna/tambah" method="POST" id="formRegistrasi"
                enctype="multipart/form-data">
                <input type="hidden" name="role" id="roleInput" value="siswa">

                <!-- TAB SISWA MANUAL -->
                <div class="tab-content active" id="siswa-manual">
                    <div class="form-grid">
                        <div class="form-input">
                            <label>NISN <span style="color: red;">*</span></label>
                            <input type="text" name="nisn" class="poppins-regular" placeholder="Masukkan NISN siswa...">
                        </div>
                        <div class="form-input">
                            <label>Nama Lengkap <span style="color: red;">*</span></label>
                            <input type="text" name="nama_lengkap" class="poppins-regular"
                                placeholder="Masukkan nama lengkap...">
                            <i class="ph ph-user"></i>
                        </div>
                        <div class="form-input">
                            <label>Email <span style="color: red;">*</span></label>
                            <input type="email" name="email" class="poppins-regular" placeholder="contoh@gmail.com">
                        <i class="ph ph-envelope"></i>
                        </div>
                        <div class="form-input select-group">
                            <label>Jurusan <span style="color: red;">*</span></label>
                            <select id="modal-select-jurusan" name="jurusan" class="poppins-regular">
                                <option value="" disabled selected>Pilih Jurusan</option>
                                <?php foreach ($data["jurusan"] as $jurusan): ?>
                                        <option value="<?= $jurusan['id_jurusan'] ?>"><?= $jurusan['nama_jurusan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="ph ph-caret-down" style="position: absolute; top: 50px;"></i>
                        </div>
                        <div class="form-input select-group">
                            <label>Kelas <span style="color: red;">*</span></label>
                            <select id="modal-select-kelas" disabled name="kelas" class="poppins-regular">
                                <option value="" disabled selected>Pilih Kelas</option>
                            </select>
                            <i class="ph ph-caret-down" style="position: absolute; top: 50px;"></i>
                        </div>
                    </div>
                </div>

                <!-- TAB SISWA CSV -->
                <div class="tab-content" id="siswa-csv">
                    <div class="alert-info">
                        <i class="ph ph-info"></i>
                        <p>Pendaftaran massal siswa menggunakan format file CSV. Pastikan format kolom sesuai dengan
                            template sistem.</p>
                    </div>
                    <div class="csv-upload-area" onclick="document.getElementById('csvFile').click()">
                        <i class="ph ph-cloud-arrow-up"></i>
                        <p id="fileName">Klik atau seret file CSV ke sini</p>
                        <input type="file" name="csv_file" id="csvFile" accept=".csv" onchange="updateFileName(this)">
                    </div>
                </div>

                <!-- TAB: PETUGAS -->
                <div class="tab-content" id="petugas">
                    <div class="form-grid">
                        <div class="form-input">
                            <label>NIP <span style="color: red;">*</span></label>
                            <input type="text" name="nip" class="poppins-regular" placeholder="Masukkan NIP...">
                        </div>
                        <div class="form-input">
                            <label>Nama Lengkap <span style="color: red;">*</span></label>
                            <input type="text" name="nama_lengkap_petugas" class="poppins-regular"
                                placeholder="Masukkan nama lengkap...">
                            <i class="ph ph-user"></i>
                        </div>
                        <div class="form-input full-width">
                            <label>Email <span style="color: red;">*</span></label>
                            <input type="email" name="email_petugas" class="poppins-regular"
                                placeholder="Email petugas...">
                            <i class="ph ph-envelope"></i>
                        </div>
                        <div class="form-input">
                            <label>Password <span style="color: red;">*</span></label>
                            <div class="password-group">
                                <input type="password" name="password_petugas" id="passPetugas" class="poppins-regular"
                                    placeholder="***">
                                <i class="ph ph-eye" onclick="togglePass('passPetugas', this)"></i>
                            </div>
                        </div>
                        <div class="form-input">
                            <label>Konfirmasi <span style="color: red;">*</span></label>
                            <div class="password-group">
                                <input type="password" name="konfirmasi_petugas" id="confPetugas"
                                    class="poppins-regular" placeholder="***">
                                <i class="ph ph-eye" onclick="togglePass('confPetugas', this)"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB ADMIN -->
                <div class="tab-content" id="admin">
                    <div class="form-grid">
                        <div class="form-input full-width">
                            <label>Username <span style="color: red;">*</span></label>
                            <input type="text" name="username_admin" class="poppins-regular"
                                placeholder="Masukkan username admin...">
                            <i class="ph ph-user-circle"></i>
                        </div>
                        <div class="form-input">
                            <label>Password <span style="color: red;">*</span></label>
                            <div class="password-group">
                                <input type="password" name="password_admin" id="passAdmin" class="poppins-regular"
                                    placeholder="***">
                                <i class="ph ph-eye" onclick="togglePass('passAdmin', this)"></i>
                            </div>
                        </div>
                        <div class="form-input">
                            <label>Konfirmasi <span style="color: red;">*</span></label>
                            <div class="password-group">
                                <input type="password" name="konfirmasi_admin" id="confAdmin" class="poppins-regular"
                                    placeholder="***">
                                <i class="ph ph-eye" onclick="togglePass('confAdmin', this)"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-cancel" id="btnBatal" class="poppins-regular">Batal</button>
                    <button type="submit" class="btn-submit" id="btnSimpan" class="poppins-regular">Simpan &
                        Daftar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('modalRegistrasi');
        const btnTambah = document.getElementById('btnTambahPengguna');
        const btnClose = document.getElementById('closeModal');
        const btnBatal = document.getElementById('btnBatal');
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        const roleInput = document.getElementById('roleInput');
        const modalSelectJurusan = document.getElementById('modal-select-jurusan');
        const modalSelectKelas = document.getElementById('modal-select-kelas');
        const tableSiswa = document.getElementById('table-siswa');
        const tablePetugas = document.getElementById('table-petugas');
        const tableAdmin = document.getElementById('table-admin');
        const selectRole = document.getElementById('select-role');

        selectRole.addEventListener('change', function () {
            const role = this.value
            if (role == 'siswa') {
                tableSiswa.style.display = 'block';
                tablePetugas.style.display = 'none';
                tableAdmin.style.display = 'none';
            } else if (role == 'petugas') {
                tableSiswa.style.display = 'none';
                tablePetugas.style.display = 'block';
                tableAdmin.style.display = 'none';
            } else if (role == 'admin') {
                tableSiswa.style.display = 'none';
                tablePetugas.style.display = 'none';
                tableAdmin.style.display = 'block';
            } else {
                tableSiswa.style.display = 'block';
                tablePetugas.style.display = 'block';
                tableAdmin.style.display = 'block';
            }
        })

        modalSelectJurusan.addEventListener('change', async function () {
            const id_jurusan = this.value
            modalSelectKelas.disabled = false;
            const response = await fetch(`<?= Constant::DIRNAME ?>jurusan/getKelasByJurusan`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id_jurusan })
            })
            const data = await response.json();

            modalSelectKelas.innerHTML = '';
            if (data.length > 0) {
                const option1 = document.createElement('option');
                option1.disabled = true;
                option1.selected = true;
                option1.value = '';
                option1.text = 'Pilih Kelas';
                modalSelectKelas.appendChild(option1);
                data.forEach(kelas => {
                    const option = document.createElement('option');
                    option.value = kelas.id_kelas;
                    option.text = kelas.tingkat;
                    modalSelectKelas.appendChild(option);
                });
            } else {
                const option = document.createElement('option');
                option.disabled = true;
                option.selected = true;
                option.value = '';
                option.text = 'Kelas tidak tersedia';
                modalSelectKelas.appendChild(option);
            }
        });

        btnTambah.addEventListener('click', () => {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        const closeModal = () => {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        };

        btnClose.addEventListener('click', closeModal);
        btnBatal.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const tabId = btn.getAttribute('data-tab');

                tabBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                tabContents.forEach(content => {
                    content.classList.remove('active');
                    if (content.id === tabId) {
                        content.classList.add('active');
                    }
                });

                if (tabId === 'siswa-manual' || tabId === 'siswa-csv') {
                    roleInput.value = 'siswa';
                } else if (tabId === 'petugas') {
                    roleInput.value = 'petugas';
                } else if (tabId === 'admin') {
                    roleInput.value = 'admin';
                }
            });
        });

        function togglePass(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('ph-eye', 'ph-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('ph-eye-slash', 'ph-eye');
            }
        }

        function updateFileName(input) {
            const fileName = document.getElementById('fileName');
            if (input.files.length > 0) {
                fileName.textContent = input.files[0].name;
                fileName.style.color = 'var(--color-primary)';
                fileName.style.fontWeight = '600';
            } else {
                fileName.textContent = 'Klik atau seret file CSV ke sini';
                fileName.style.color = 'var(--color-muted-foreground)';
                fileName.style.fontWeight = '400';
            }
        }
    </script>
</div>