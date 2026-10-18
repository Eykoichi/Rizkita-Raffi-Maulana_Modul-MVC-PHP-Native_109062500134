# MVC PHP Native - Data Produk (Elektronik)
Aplikasi CRUD sederhana untuk mempelajari pola Model-View-Controller pada PHP Native.

---

## Kebutuhan
- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- Web server lokal seperti XAMPP atau Laragon
- Git

---

## Instalasi
1. Clone atau salin project ke folder web server.
2. Import `database/produk_elektronik.sql`.
3. Sesuaikan koneksi pada `config/database.php`.
4. Buka `http://localhost/public/index.php`.

---

## Struktur Folder MVC
data_produk_mvc/
├── app/
│   ├── controllers/
│   │   └── ProdukController.php   # Mengatur alur logika request & respon
│   ├── models/
│   │   └── Produk.php             # Menangani query database menggunakan PDO
│   └── views/
│       ├── layout/
│       │   ├── header.php         # Bagian atas layout web (navbar, CDN CSS/JS)
│       │   └── footer.php         # Bagian bawah layout web (footer)
│       └── produk/
│           ├── index.php          # Halaman utama daftar produk
│           ├── create.php         # Halaman form tambah produk
│           ├── edit.php           # Halaman form edit produk
│           └── _form.php          # Parsial form reusable
├── config/
│   └── database.php               # Konfigurasi koneksi database PDO
├── database/
│   └── produk_elektronik.sql      # Skema database & data awal
├── public/
│   ├── index.php                  # Front Controller / Entry Point utama aplikasi
│   ├── css/
│   │   └── style.css              # Berkas stylesheet tambahan
│   └── js/
│       └── app.js                 # Berkas skrip JavaScript tambahan
├── .gitignore                     # Berkas penyaring file sementara
└── README.md                      # Dokumentasi proyek

---

## Fitur
- Menampilkan data produk
- Menambah data produk
- Mengubah data produk
- Menghapus data produk
- Validasi input pada field wajib (kode, nama, kategori, harga, stok)
- Pengecekan kode produk duplikat secara realtime dan saat penyimpanan
- Pesan notifikasi saat operasi berhasil atau gagal
- Pencarian produk langsung di tabel

---

## Histori Git
* 1d54cc8 (HEAD -> main) docs: melengkapi README dengan panduan instalasi dan git log
* 9972159 style: tambah CSS dan interaksi JavaScript (pencarian, modal hapus, cek kode duplikat)
* 772a0f4 feat: tambah view layout, daftar produk, serta form create dan edit
* 9430278 feat: tambah ProdukController, validasi input, dan front controller
* de5c581 feat: tambah model Produk dengan operasi CRUD prepared statement
* 403ab51 feat: tambah skema database produk dan konfigurasi koneksi PDO
* e5cc720 chore: inisialisasi repository dan struktur folder MVC