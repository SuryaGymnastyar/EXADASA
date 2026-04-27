<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="css/global.css">
</head>

<body>
    <div class="modal-box">
        <div class="modal-header">
            <h3>+ Tambah Mahasiswa</h3>
        </div>

        <form action="proses_tambah.php" method="POST">
            
            <div class="form-group">
                <label for="nama">Nama Lengkap *</label><br>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>
            <br>

            <div class="form-group">
                <label for="nis">NIS *</label><br>
                <input type="text" id="nis" name="nis" placeholder="Nomor Induk Siswa" required>
            </div>
            <br>

            <div class="form-group">
                <label for="username">Username *</label><br>
                <input type="text" id="username" name="username" placeholder="Contoh: nama.mahasiswa" required>
            </div>
            <br>

            <div class="form-group">
                <label for="password">Password *</label><br>
                <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required>
            </div>
            <br>

            <div class="form-actions">
                <button type="button" class="btn-batal">Batal</button>
                <button type="submit" class="btn-simpan">Simpan</button>
            </div>

        </form>
    </div>

</body>
</html>