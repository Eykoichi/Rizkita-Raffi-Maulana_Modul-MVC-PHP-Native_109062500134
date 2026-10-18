<?php
require_once __DIR__ . '/../../config/database.php';

class Produk
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function all(): array
    {
        return $this->db->query("SELECT * FROM produk_elektronik ORDER BY id DESC")->fetchAll();
    }

    public function find(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM produk_elektronik WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function kodeExists(string $kode, ?int $exceptId = null): bool
    {
        $sql = "SELECT COUNT(*) FROM produk_elektronik WHERE kode_produk = :kode";
        $params = [':kode' => $kode];
        if ($exceptId !== null) {
            $sql .= " AND id != :id";
            $params[':id'] = $exceptId;
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return (int) $stmt->fetchColumn() > 0;
    }

    public function create(array $d): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO produk_elektronik (kode_produk, nama_produk, kategori, harga, stok, deskripsi)
             VALUES (:kode, :nama, :kategori, :harga, :stok, :deskripsi)"
        );
        return $stmt->execute([
            ':kode'      => $d['kode_produk'],
            ':nama'      => $d['nama_produk'],
            ':kategori'  => $d['kategori'],
            ':harga'     => $d['harga'],
            ':stok'      => $d['stok'],
            ':deskripsi' => $d['deskripsi'],
        ]);
    }

    public function update(int $id, array $d): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE produk_elektronik SET kode_produk = :kode, nama_produk = :nama, kategori = :kategori,
             harga = :harga, stok = :stok, deskripsi = :deskripsi WHERE id = :id"
        );
        return $stmt->execute([
            ':kode'      => $d['kode_produk'],
            ':nama'      => $d['nama_produk'],
            ':kategori'  => $d['kategori'],
            ':harga'     => $d['harga'],
            ':stok'      => $d['stok'],
            ':deskripsi' => $d['deskripsi'],
            ':id'        => $id,
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM produk_elektronik WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}