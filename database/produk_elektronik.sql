CREATE DATABASE IF NOT EXISTS produk_elektronik;

USE produk_elektronik;

CREATE TABLE IF NOT EXISTS produk_elektronik (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_produk VARCHAR(20) NOT NULL UNIQUE,
    nama_produk VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    harga DECIMAL(12,2) NOT NULL DEFAULT 0,
    stok INT NOT NULL DEFAULT 0,
    deskripsi TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO produk_elektronik (kode_produk, nama_produk, kategori, harga, stok, deskripsi) VALUES
('LAP-ASUS14', 'ASUS Vivobook 14 OLED M1405', 'Laptop', 9250000.00, 10, 'Laptop tipis dengan layar OLED 2.K dan prosesor AMD Ryzen 5.'),
('HP-SAM24', 'Samsung Galaxy A55 5G 8/256GB', 'HP', 5999000.00, 15, 'Smartphone 5G dengan kamera tajam dan baterai tahan lama.'),
('KBL-CANC1M', 'Anker Kabel Data Type-C to Type-C 100W 1M', 'Kabel Charger', 85000.00, 50, 'Kabel charger fast charging kuat dengan balutan braided nylon.'),
('ADP-UGREEN65', 'Ugreen Nexode GaN Fast Charger 65W', 'Kepala Adaptor', 349000.00, 25, 'Kepala charger port ganda USB-C berbasis teknologi GaN yang ringkas.'),
('LAP-LENOVO5', 'Lenovo IdeaPad Slim 3 i5-1235U', 'Laptop', 7850000.00, 8, 'Laptop harian andal untuk produktivitas dan kuliah.'),
('HP-XM13C', 'Xiaomi Redmi Note 13 Pro 8/256GB', 'HP', 3499000.00, 20, 'Smartphone kelas menengah dengan kamera utama 200MP.'),
('KBL-VIVORGB', 'Vivan Kabel Data Micro USB / Type-C Fast Charging', 'Kabel Charger', 35000.00, 60, 'Kabel fleksibel mendukung pengisian daya cepat 2.4A.'),
('ADP-SAM45W', 'Samsung Super Fast Wall Charger 45W (Adapter Only)', 'Kepala Adaptor', 299000.00, 30, 'Adaptor original Samsung untuk pengisian super cepat perangkat kompatibel.');