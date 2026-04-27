<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="modal-page">
    <div class="modal-box">
        <div class="modal-header">
            <h3>+ Tambah Mahasiswa</h3>
            <button type="button" class="btn-close" onclick="history.back()">&#x2715;</button>
        </div>

        <form action="proses_tambah.php" method="POST">

            <div class="modal-form-group">
                <label for="nama">Nama Lengkap <span class="required">*</span></label>
                <div class="modal-input-wrapper">
                    <i class="ph ph-user"></i>
                    <input type="text" id="nama" name="nama"
                        placeholder="Masukkan nama lengkap"
                        class="modal-input" required>
                </div>
            </div>

            <div class="modal-form-group">
                <label for="nis">NIS <span class="required">*</span></label>
                <div class="modal-input-wrapper">
                    <i class="ph ph-identification-card"></i>
                    <input type="text" id="nis" name="nis"
                        placeholder="Nomor Induk Siswa"
                        class="modal-input" required>
                </div>
            </div>

            <div class="modal-form-group">
                <label for="username">Username <span class="required">*</span></label>
                <div class="modal-input-wrapper">
                    <i class="ph ph-at"></i>
                    <input type="text" id="username" name="username"
                        placeholder="Contoh: nama.mahasiswa"
                        class="modal-input" required>
                </div>
            </div>

            <div class="modal-form-group">
                <label for="password">Password <span class="required">*</span></label>
                <div class="modal-input-wrapper">
                    <i class="ph ph-lock"></i>
                    <input type="password" id="password" name="password"
                        placeholder="Minimal 8 karakter"
                        class="modal-input" required>
                </div>
            </div>

            <div class="modal-divider"></div>

            <div class="form-actions">
                <button type="button" class="btn-batal" onclick="history.back()">Batal</button>
                <button type="submit" class="btn-simpan">
                    <i class="ph ph-floppy-disk"></i>
                    Simpan
                </button>
            </div>

        </form>
    </div>
</body>

</html>