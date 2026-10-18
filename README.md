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

## Struktur Folder
data_produk_mvc/
│
├── app/                  # Direktori utama logika aplikasi (MVC)
│   ├── controllers/      # Mengatur alur logika request dari pengguna & merespons tampilan
│   ├── models/           # Menangani interaksi dan query database menggunakan PDO
│   └── views/            # Menyimpan antarmuka pengguna (UI) / file tampilan HTML & PHP
│       ├── layout/       # Komponen tata letak global (header, footer, dll)
│       └── produk/       # Kumpulan halaman antarmuka khusus fitur produk
│
├── config/               # Berkas konfigurasi sistem (koneksi database, dll)
├── database/             # Berkas SQL untuk migrasi skema database dan data awal
├── public/               # Direktori publik yang dapat diakses langsung oleh browser (Document Root)
│   ├── css/              # Berkas stylesheet tambahan untuk styling antarmuka
│   ├── js/               # Berkas skrip JavaScript untuk interaktivitas
│   └── index.php         # Front Controller / Entry Point utama yang mengarahkan semua request
│
├── .gitignore            # Berkas untuk menentukan file/folder yang diabaikan oleh Git
└── README.md             # Dokumentasi proyek

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