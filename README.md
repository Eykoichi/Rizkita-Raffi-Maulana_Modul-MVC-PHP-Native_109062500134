# MVC PHP Native - Data Produk (Elektronik)
Aplikasi CRUD sederhana untuk mempelajari pola Model-View-Controller pada PHP Native.
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
4. Buka `http://localhost/mvc-native/public/index.php`.

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
- Menampilkan data mahasiswa
- Menambah data mahasiswa
- Mengubah data mahasiswa
- Menghapus data mahasiswa