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
mvc-native/
├── app/
│   ├── controllers/
│   │   └── ProdukController.php
│   ├── models/
│   │   └── Produk.php
│   └── views/
│       ├── layout/
│       │   ├── header.php
│       │   └── footer.php
│       └── produk/
│           ├── index.php
│           ├── create.php
│           ├── edit.php
│           └── _form.php
├── config/
│   └── database.php
├── database/
│   └── produk.sql
├── public/
│   ├── index.php
│   ├── css/style.css
│   └── js/app.js
├── .gitignore
└── README.md

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