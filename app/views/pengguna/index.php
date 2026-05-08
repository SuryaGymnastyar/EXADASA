<div class="container pengguna">
    <div class="pengguna-header">
        <div class="pengguna-title">
            <h1 class="poppins-semibold">Manajemen pengguna</h1>
            <p class="poppins-regular">Buat akun siswa & petugas, atur kelas, reset password.</p>
        </div>
        <button class="btn-primary">
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
                <select class="form-select poppins-regular">
                    <option value="">Semua Role</option>
                    <option>Admin</option>
                    <option>Siswa</option>
                    <option>Petugas</option>
                </select>
                <i class="ph ph-caret-down select-caret"></i>
            </div>
        </div>
    </div>
    <div class="ujian-table">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Kelas</th>
                    <th>Aktif</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="info-name">
                            <div class="img">
                                MR
                            </div>
                            <div class="info">
                                <p style="font-weight: 600; color: #000; font-size: 0.9rem;">M. Rafly Saputra</p>
                                <p style="font-size: 0.7rem;">rafly@gmail.com</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        Rafly
                    </td>
                    <td>
                        <span>siswa</span>
                    </td>
                    <td>
                        XII IPA 1
                    </td>
                    <td>
                        Toggle
                    </td>
                    <td>
                        <div>
                            <button class="btn-edit">
                                <i class="ph ph-pencil"></i>
                            </button>
                            <button class="btn-danger">
                                <i class="ph ph-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>