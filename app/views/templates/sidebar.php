<section class="wrapper">
    <aside>
        <header>
            <a href="#hero" style="all: inherit; cursor: pointer;">
                <i class="ph ph-graduation-cap bg-icon-primary" style="font-size: 20px; color: #fff;"></i>
                <div class="title-group">
                    <h1 class="poppins-semibold">EduCBT</h1>
                    <p class="poppins-light">SMART EXAM PLATFORM</p>
                </div>
            </a>
        </header>
        <section class="box-menu">
            <p class="poppins-medium" style="font-size: 12px; color: var(--color-muted-foreground)">MENU</p>
            <a href="<?= Constant::DIRNAME ?>dashboard"
                class="menu <?= $data["title"] == "Dashboard" ? "active" : "" ?>">
                <i class="ph ph-house" style="font-size: 20px;"></i>
                <p class="poppins-regular" style="font-size: 14px;">Dashboard</p>
            </a>
            <?php if ($_SESSION['user']['role'] == "admin"): ?>
                <a href="<?= Constant::DIRNAME ?>ujian" class="menu <?= $data["title"] == "Ujian" ? "active" : "" ?>">
                    <i class="ph ph-clipboard-text" style="font-size: 20px;"></i>
                    <p class="poppins-regular" style="font-size: 14px;">Ujian</p>
                </a>
            <?php endif; ?>

            <?php if ($_SESSION['user']['role'] == "siswa"): ?>
                <a href="<?= Constant::DIRNAME ?>ujianSiswa" class="menu <?= $data["title"] == "Ujian Siswa" ? "active" : "" ?>">
                    <i class="ph ph-clipboard-text" style="font-size: 20px;"></i>
                    <p class="poppins-regular" style="font-size: 14px;">Ujian Saya</p>
                </a>
                <a href="<?= Constant::DIRNAME ?>hasilUjian"
                    class="menu <?= $data["title"] == "Hasil Ujian" ? "active" : "" ?>">
                    <i class="ph ph-files" style="font-size: 20px;"></i>
                    <p class="poppins-regular" style="font-size: 14px;">Hasil Ujian</p>
                </a>
            <?php endif; ?>

            <a href="<?= Constant::DIRNAME ?>profile" class="menu <?= $data["title"] == "Profile" ? "active" : "" ?>">
                <i class="ph ph-user" style="font-size: 20px;"></i>
                <p class="poppins-regular" style="font-size: 14px;">Profile</p>
            </a>
        </section>
        <a href="<?= Constant::DIRNAME ?>dashboard/logout" class="btn-logout">
            <i class="ph ph-sign-out" style="font-size: 20px;"></i>
            <p class="poppins-regular" style="font-size: 14px;">Logout</p>
        </a>
    </aside>
    <main>