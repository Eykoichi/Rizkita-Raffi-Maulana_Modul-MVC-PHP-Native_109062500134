<?php
$kategoriList = ['Laptop', 'HP', 'Kabel Charger', 'Kepala Adaptor'];
$isEdit = isset($id);
$v = fn($k) => e($old[$k] ?? '');
?>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger shadow-sm" role="alert">
        <i class="bi bi-exclamation-octagon-fill me-2"></i>
        <strong>Data belum bisa disimpan.</strong>
        <?= isset($errors['umum']) ? e($errors['umum']) : 'Periksa kembali isian yang ditandai merah.' ?>
    </div>
<?php endif; ?>

<form method="post" action="index.php?action=<?= $isEdit ? 'update' : 'store' ?>" id="formProduk" novalidate>
    <?php if ($isEdit): ?>
        <input type="hidden" name="id" id="produkId" value="<?= (int) $id ?>">
    <?php endif; ?>

    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label">Kode Produk <span class="text-danger">*</span></label>
            <input type="text" name="kode_produk" id="kodeProduk" maxlength="20"
                   class="form-control <?= isset($errors['kode_produk']) ? 'is-invalid' : '' ?>"
                   value="<?= $v('kode_produk') ?>" placeholder="mis. LAP-ASUS14">
            <div class="invalid-feedback" id="kodeFeedback"><?= e($errors['kode_produk'] ?? '') ?></div>
        </div>

        <div class="col-md-8">
            <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
            <input type="text" name="nama_produk" maxlength="100"
                   class="form-control <?= isset($errors['nama_produk']) ? 'is-invalid' : '' ?>"
                   value="<?= $v('nama_produk') ?>">
            <div class="invalid-feedback"><?= e($errors['nama_produk'] ?? '') ?></div>
        </div>

        <div class="col-md-4">
            <label class="form-label">Kategori <span class="text-danger">*</span></label>
            <select name="kategori" class="form-select <?= isset($errors['kategori']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih --</option>
                <?php foreach ($kategoriList as $k): ?>
                    <option value="<?= e($k) ?>" <?= ($old['kategori'] ?? '') === $k ? 'selected' : '' ?>><?= e($k) ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?= e($errors['kategori'] ?? '') ?></div>
        </div>

        <div class="col-md-4">
            <label class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
            <input type="number" name="harga" id="harga" min="0" step="1"
                   class="form-control <?= isset($errors['harga']) ? 'is-invalid' : '' ?>"
                   value="<?= $v('harga') !== '' ? e((int) ($old['harga'] ?? 0)) : '' ?>">
            <div class="form-text" id="hargaPreview"></div>
            <div class="invalid-feedback"><?= e($errors['harga'] ?? '') ?></div>
        </div>

        <div class="col-md-4">
            <label class="form-label">Stok <span class="text-danger">*</span></label>
            <input type="number" name="stok" min="0" step="1"
                   class="form-control <?= isset($errors['stok']) ? 'is-invalid' : '' ?>"
                   value="<?= $v('stok') ?>">
            <div class="invalid-feedback"><?= e($errors['stok'] ?? '') ?></div>
        </div>

        <div class="col-12">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" rows="3" class="form-control"><?= $v('deskripsi') ?></textarea>
        </div>
    </div>

    <div class="mt-4 d-flex gap-2">
        <button type="submit" class="btn btn-primary" id="btnSimpan">
            <i class="bi bi-save"></i> <?= $isEdit ? 'Perbarui' : 'Simpan' ?>
        </button>
        <a href="index.php" class="btn btn-light">Batal</a>
    </div>
</form>