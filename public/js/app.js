document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.auto-dismiss').forEach(el => {
        setTimeout(() => bootstrap.Alert.getOrCreateInstance(el).close(), 4000);
    });

    const search = document.getElementById('searchInput');
    if (search) {
        search.addEventListener('input', () => {
            const q = search.value.toLowerCase();
            document.querySelectorAll('#tabelProduk tbody tr').forEach(tr => {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }

    const modalEl = document.getElementById('modalHapus');
    if (modalEl) {
        const modal = new bootstrap.Modal(modalEl);
        document.querySelectorAll('.btn-hapus').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('idHapus').value = btn.dataset.id;
                document.getElementById('namaHapus').textContent = btn.dataset.nama;
                modal.show();
            });
        });
    }

    const harga = document.getElementById('harga');
    const preview = document.getElementById('hargaPreview');
    if (harga && preview) {
        const render = () => {
            preview.textContent = harga.value !== ''
                ? 'Terbaca: ' + new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(harga.value)
                : '';
        };
        harga.addEventListener('input', render);
        render();
    }

    const form = document.getElementById('formProduk');
    if (form) {
        form.addEventListener('input', e => e.target.classList.remove('is-invalid'));
        form.addEventListener('submit', () => {
            const btn = document.getElementById('btnSimpan');
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Menyimpan...';
        });
    }

    const kode = document.getElementById('kodeProduk');
    const feedback = document.getElementById('kodeFeedback');
    const btnSimpan = document.getElementById('btnSimpan');
    const produkId = document.getElementById('produkId');
    let timer;

    if (kode) {
        kode.addEventListener('input', () => {
            kode.value = kode.value.toUpperCase();
            kode.classList.remove('is-valid', 'is-invalid');
            btnSimpan.disabled = false;
            clearTimeout(timer);
            if (kode.value.trim() === '') return;

            timer = setTimeout(async () => {
                let url = 'index.php?action=cek_kode&kode=' + encodeURIComponent(kode.value.trim());
                if (produkId) url += '&id=' + produkId.value;
                try {
                    const res = await fetch(url);
                    const data = await res.json();
                    if (data.exists) {
                        feedback.textContent = 'Kode produk "' + kode.value.trim() + '" sudah terdaftar! Gunakan kode lain.';
                        kode.classList.add('is-invalid');
                        btnSimpan.disabled = true;
                    } else {
                        kode.classList.add('is-valid');
                    }
                } catch (err) { /* abaikan, validasi server tetap berjalan */ }
            }, 400);
        });
    }
});