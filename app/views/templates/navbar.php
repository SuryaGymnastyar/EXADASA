<nav>
    <button style="all: unset">
        <i class="ph ph-list"></i>
    </button>
    <!-- <div class="input-navbar form-input">
        <input type="text" name="search" id="search" placeholder="Cari disini..." style="padding-right: 40px;" class="poppins-regular">
        <i class="ph ph-magnifying-glass"></i>
    </div> -->
    <div class="group-navbar">
        <i class="ph ph-bell"></i>
        <div class="profil-navbar">
            <div class="title">
                <h2 class="poppins-semibold"><?= $_SESSION['user']['nama_lengkap'] ?></h2>
                <p class="poppins-light"><?= $_SESSION['user']['role'] ?></p>
            </div>
            <div class="img" style="background-color: var(--color-primary);">
                <span class="poppins-semibold" style="margin: auto; color: #fff; text-transform: uppercase;"><?= $_SESSION['user']['foto'] ?? $_SESSION['user']['nama_lengkap'][0] ?></span>
            </div>
            <!-- <img src="" alt="profil"> -->
        </div>
    </div>
</nav>