<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <h4 class="mb-0"><i class="bi bi-list-ul me-2"></i>Daftar Produk</h4>
    <div class="d-flex gap-2">
        <input type="text" id="searchInput" class="form-control" placeholder="Cari produk...">
        <a href="index.php?action=create" class="btn btn-primary text-nowrap">
            <i class="bi bi-plus-lg"></i> Tambah
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0" id="tabelProduk">
            <thead class="table-light">
                <tr>
                    <th>No</th><th>Kode</th><th>Nama Produk</th><th>Kategori</th>
                    <th class="text-end">Harga</th><th class="text-center">Stok</th><th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if (empty($produk)): ?>
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data produk.</td></tr>
            <?php else: foreach ($produk as $i => $p): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><span class="badge text-bg-secondary"><?= e($p['kode_produk']) ?></span></td>
                    <td>
                        <div class="fw-semibold"><?= e($p['nama_produk']) ?></div>
                        <small class="text-muted"><?= e(mb_strimwidth($p['deskripsi'] ?? '', 0, 50, '...')) ?></small>
                    </td>
                    <td><?= e($p['kategori']) ?></td>
                    <td class="text-end">Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
                    <td class="text-center">
                        <span class="badge <?= $p['stok'] <= 5 ? 'text-bg-danger' : 'text-bg-success' ?>"><?= (int) $p['stok'] ?></span>
                    </td>
                    <td class="text-center text-nowrap">
                        <a href="index.php?action=edit&id=<?= (int) $p['id'] ?>" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-hapus"
                                data-id="<?= (int) $p['id'] ?>" data-nama="<?= e($p['nama_produk']) ?>">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalHapus" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" action="index.php?action=destroy" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger"><i class="bi bi-exclamation-triangle me-2"></i>Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus produk <strong id="namaHapus"></strong>? Tindakan ini tidak dapat dibatalkan.
                <input type="hidden" name="id" id="idHapus">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </div>
        </form>
    </div>
</div>