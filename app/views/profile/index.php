<main class="profile-container">
    <header class="profile-header">
        <h1>Profile Saya</h1>
        <p>Kelola informasi akun dan kata sandimu.</p>
    </header>

    <div class="profile-content">
        <div class="profile-avatar">
            <div class="avatar-border">
                <div class="avatar-circle">MS</div>

                <label for="input-foto" class="upload-icon" style="cursor: pointer;"> 📷
                    <input type="file" id="input-foto" name="foto_profil" accept="image/*" style="display: none;">
                </label>
            </div>

            <div class="profile-user">
                <h2>M. Surya Gymnastyar</h2>
                <p>XII IPA 6 • Siswa</p>
            </div>

            <div class="profile-user-info">
                <div class="info-list">
                    <strong>3</strong>
                    <span>Ujian</span>
                </div>
                <div class="info-list">
                    <strong>87.5</strong>
                    <span>Rata-Rata Nilai</span>
                </div>
            </div>
        </div>

        <div class="profile-form">
            <div class="form-card">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-label">
                        <h3>Informasi Akun</h3>
                        <div class="form-group">
                            <div class="form-input">
                                <label>Nama Lengkap</label>
                                <input type="text" id="name" name="name" value="M. Surya Gymnastyar" required>
                            </div>
                            <div class="form-input">
                                <label>Username</label>
                                <input type="text" id="username" name="username" value="surya" required>
                            </div>
                            <div class="form-input">
                                <label>Email</label>
                                <input type="email" id="email" name="email" value="surya@smandasa.id" required>
                            </div>
                            <div class="form-input">
                                <label>Kelas</label>
                                <input type="text" id="kelas" name="kelas" value="XII IPA 6" disabled>
                            </div>
                        </div>
                    </div>

                    <hr class="form-divider">

                    <div class="form-password">
                        <h3>Ganti Kata Sandi</h3>
                        <div class="form-group">
                            <div class="form-input">
                                <label>Kata Sandi Lama</label>
                                <input type="password" id="current_password" name="current_password" placeholder="Masukkan kata sandi lama">
                            </div>
                            <div class="form-input">
                                <label>Kata Sandi Baru</label>
                                <input type="password" id="new_password" name="new_password" placeholder="Masukkan kata sandi baru">
                            </div>
                            <div class="form-input">
                                <label>Konfirmasi Kata Sandi Baru</label>
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi kata sandi baru">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-batal">Batal</button>
                        <button type="submit" class="btn-simpan">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>