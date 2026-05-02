<section class="auth">
    <section class="container left">
        <header>
            <a href="<?= Constant::DIRNAME ?>" style="all: inherit; cursor: pointer;">
                <i class="ph ph-graduation-cap bg-icon-primary" style="font-size: 20px; color: #fff;"></i>
                <div class="title-group">
                    <h1 class="poppins-semibold">EduCBT</h1>
                    <p class="poppins-light">SMART EXAM PLATFORM</p>
                </div>
            </a>
        </header>
        <main>
            <h1 class="poppins-bold">Belajar & Ujian,
                Sekarang Lebih Cerdas.</h1>
            <p class="poppins-regular">
                Platform CBT modern dengan koreksi otomatis, monitoring real-time, dan analitik lengkap untuk sekolah
                Anda.
            </p>
            <div class="box-service">
                <div class="box">
                    <h2 class="poppins-semibold">10K+</h2>
                    <p>Siswa</p>
                </div>
                <div class="box">
                    <h2 class="poppins-semibold">240+</h2>
                    <p>Sekolah</p>
                </div>
                <div class="box">
                    <h2 class="poppins-semibold">95%</h2>
                    <p>Real-Time</p>
                </div>
            </div>
        </main>
        <footer>
            <p class="poppins-regular" style="font-size: 12px; color: var(--color-muted);">&copy; 2026 EduCBT</p>
        </footer>
    </section>
    <section class="container right">
        <form action="" method="post">
            <header>
                <h1 class="poppins-semibold">Selamat Datang Kembali</h1>
                <p class="poppins-regular">Masukan username dan password anda</p>
            </header>
            <section class="input-group">
                <div class="form-input">
                    <label for="username" class="poppins-medium">Username</label>
                    <input type="text" name="username" id="username" style="padding-right: 40px;" placeholder="Masukkan username..." class="poppins-regular">
                    <i class="ph ph-user"></i>
                </div>
                <div class="form-input">
                    <label for="password" class="poppins-medium">Password</label>
                    <input type="password" name="password" id="password" style="padding-right: 40px;" placeholder="Masukkan password..." class="poppins-regular">
                    <i class="ph ph-eye"></i>
                </div>
            </section>
            <a href="" class="poppins-regular"
                style="font-size: 12px; color: var(--color-primary); width: 100%; text-align: right; text-decoration: none;">Lupa
                password?</a>
            <button class="btn-primary poppins-semibold" style="width: 100%;">
                Masuk
            </button>
            <p class="poppins-regular"
                style="font-size: 12px; text-align: center; margin-top: 16px; color: var(--color-muted-foreground);">
                Akun hanya dapat dibuat oleh admin sekolah.</p>
        </form>
    </section>
</section>

<script>
    const eye = document.querySelector(".ph-eye");
    const password = document.querySelector("#password");
    eye.addEventListener("click", function () {
        if (password.type === "password") {
            eye.className = "ph ph-eye-slash";
            password.type = "text";
        } else {
            password.type = "password";
            eye.className = "ph ph-eye";
        }
    });
</script>