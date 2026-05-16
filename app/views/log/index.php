<div class="container log">
    <header class="log-header">
        <div class="log-title">
            <h1 class="poppins-semibold">Log Aktivitas</h1>
            <p class="poppins-regular">Riwayat tindakan seluruh pengguna pada sistem.</p>
        </div>
    </header>
    <div class="card-search">
        <div class="card">
            <div class="filter-search">
                <i class="ph ph-magnifying-glass"></i>
                <input type="text" id="searchLog" class="poppins-regular" placeholder="Cari Log Aktivitas..." />
            </div>
        </div>
    </div>
    <div class="log-table">
        <table id="logTable">
            <thead>
                <tr>
                    <th>Aksi</th>
                    <th>Pengguna</th>
                    <th>Deskripsi</th>
                    <th>Tanggal & Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data['logs'])): ?>
                    <tr>
                        <td colspan="4" style="text-align:center; padding: 24px; color: #64748b;">
                            Belum ada aktivitas tercatat.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($data['logs'] as $log): ?>
                        <tr>
                            <td>
                                <span class="badge <?= $log['aksi']['class'] ?>">
                                    <?= $log['aksi']['label'] ?>
                                </span>
                            </td>
                            <td><?= htmlspecialchars($log['pengguna']) ?></td>
                            <td><?= htmlspecialchars($log['deskripsi']) ?></td>
                            <td><?= date('Y-m-d H:i', strtotime($log['created_at'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('searchLog').addEventListener('input', function () {
        const q = this.value.toLowerCase();
        document.querySelectorAll('#logTable tbody tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    });
</script>