<div class="container pengaturan">
    <header class="pengaturan-header">
        <div class="pengaturan-title">
            <h1 class="poppins-semibold">Pengaturan</h1>
            <p class="poppins-regular">Branding, identitas sekolah, dan konfigurasi global.</p>
        </div>
    </header>
    <section class="container-card">
        <section class="card-sistem">
            <div class="card-header">
                <i class="ph ph-building-office"></i>
                <h4>Identitas Sistem</h4>
            </div>
            <div class="form-group">
                <div class="form-input">
                    <label for="name-sistem" class="poppins-medium">Nama Sistem</label>
                    <input type="text" id="name-sistem" name="name-sistem" class="poppins-regular" value="EduCBT"
                        required>
                </div>
                <div class="form-input">
                    <label class="poppins-medium">Nama Sekolah</label>
                    <input type="text" id="name-scholl" name="name-scholl" class="poppins-regular" value="SMANDASA"
                        required>
                </div>
                <div class="form-input">
                    <label class="poppins-medium">Tahun Ajaran</label>
                    <input type="text" id="tahunAjaran" name="tahunAjaran" class="poppins-regular"
                        value="surya@smandasa.id" required>
                </div>
                <div class="form-input">
                    <label class="poppins-medium">Footer</label>
                    <textarea type="text" id="footer" name="footer"
                        class="poppins-regular">© 2026 SMANDASA Powered by EduCBT.</textarea>
                </div>
            </div>
        </section>
        <section class="card-brand">
            <div class="card-header">
                <i class="ph ph-palette"></i>
                <h4>Identitas Sistem</h4>
            </div>
            <div class="form-group">
                <div class="form-input">
                    <label for="name-sistem" class="poppins-medium">Logo Aplikasi</label>
                    <div class="logo-sistem">
                        <i class="ph ph-building-office" style="all: unset"></i>
                        <!-- <img src="" alt="Logo EduCBT"> -->
                    </div>
                    <div class="btn-upload">
                        <i class="ph ph-upload" style="all: unset;"></i>
                        <span>Upload Logo</span>
                        <input type="file" id="name-sistem"
                            style="position: absolute; inset: 0; opacity: 0;" name="name-sistem"
                            class="poppins-regular" value="EduCBT" required>
                    </div>
                </div>
                <div class="form-input">
                    <label for="name-sistem" class="poppins-medium">Icon Aplikasi</label>
                    <div class="logo-sistem">
                        <i class="ph ph-building-office" style="all: unset"></i>
                        <!-- <img src="" alt="Logo EduCBT"> -->
                    </div>
                    <div class="btn-upload" >
                        <i class="ph ph-upload" style="all: unset;"></i>
                        <span>Upload Icon</span>
                        <input type="file" id="name-sistem"
                            style="position: absolute; inset: 0; opacity: 0;" name="name-sistem"
                            class="poppins-regular" value="EduCBT" required>
                    </div>
                </div>
                <div class="form-input">
                    <label for="name-sistem" class="poppins-medium">Warna Utama</label>
                    <div class="color-sistem">
                        <div class="box-color active-color" style="background-color: blue;">
                            <input type="radio" name="color-sistem">
                        </div>
                        <div class="box-color" style="background-color: purple;">
                            <input type="radio" name="color-sistem">
                        </div>
                        <div class="box-color" style="background-color: pink;">
                            <input type="radio" name="color-sistem">
                        </div>
                        <div class="box-color" style="background-color: yellow;">
                            <input type="radio" name="color-sistem">
                        </div>
                        <div class="box-color" style="background-color: cyan;">
                            <input type="radio" name="color-sistem">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="card-sistem">
        <h1 class="poppins-semibold" style="margin-bottom: 18px;">Mode Sistem</h1>
        <div class="card-group">
            <div class="box-card">
                <div class="info-card">
                    <h3>Mode Maintenance</h3>
                    <p>Tutup sementara akses untuk siswa & petugas.</p>
                </div>
                <div class="toggle">

                </div>
            </div>
           
        </div>
        <div class="btn-group">
            <button class="btn-secondary">Batal</button>
            <button class="btn-primary">Simpan Perubahan</button>
        </div>
    </section>
</div>