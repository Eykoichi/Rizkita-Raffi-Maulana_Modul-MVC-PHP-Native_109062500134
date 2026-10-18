<?php
require_once __DIR__ . '/../models/Produk.php';

class ProdukController
{
    private Produk $model;

    public function __construct()
    {
        $this->model = new Produk();
    }

    public function index(): void
    {
        $produk = $this->model->all();
        $this->render('produk/index', compact('produk'));
    }

    public function create(): void
    {
        $this->render('produk/create', ['errors' => [], 'old' => []]);
    }

    public function store(): void
    {
        $old    = $this->input();
        $errors = $this->validate($old);

        if (empty($errors)) {
            try {
                $this->model->create($old);
                $this->flash('success', 'Produk "' . $old['nama_produk'] . '" berhasil ditambahkan.');
                $this->redirect('index.php');
            } catch (PDOException $e) {
                if (($e->errorInfo[1] ?? 0) == 1062) {
                    $errors['kode_produk'] = 'Kode produk "' . $old['kode_produk'] . '" sudah terdaftar!';
                } else {
                    $errors['umum'] = 'Terjadi kesalahan database. Data gagal disimpan.';
                }
            }
        }
        $this->render('produk/create', compact('errors', 'old'));
    }

    public function edit(): void
    {
        $id     = (int) ($_GET['id'] ?? 0);
        $produk = $this->model->find($id);
        if (!$produk) {
            $this->flash('danger', 'Data produk tidak ditemukan.');
            $this->redirect('index.php');
        }
        $this->render('produk/edit', ['errors' => [], 'old' => $produk, 'id' => $id]);
    }

    public function update(): void
    {
        $id     = (int) ($_POST['id'] ?? 0);
        $old    = $this->input();
        $errors = $this->validate($old, $id);

        if (empty($errors)) {
            try {
                $this->model->update($id, $old);
                $this->flash('success', 'Produk "' . $old['nama_produk'] . '" berhasil diperbarui.');
                $this->redirect('index.php');
            } catch (PDOException $e) {
                if (($e->errorInfo[1] ?? 0) == 1062) {
                    $errors['kode_produk'] = 'Kode produk "' . $old['kode_produk'] . '" sudah dipakai produk lain!';
                } else {
                    $errors['umum'] = 'Terjadi kesalahan database. Data gagal diperbarui.';
                }
            }
        }
        $this->render('produk/edit', compact('errors', 'old', 'id'));
    }

    public function destroy(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        try {
            $this->model->delete($id);
            $this->flash('success', 'Produk berhasil dihapus.');
        } catch (PDOException $e) {
            $this->flash('danger', 'Gagal menghapus produk.');
        }
        $this->redirect('index.php');
    }

    public function cekKode(): void
    {
        $kode = strtoupper(trim($_GET['kode'] ?? ''));
        $id   = isset($_GET['id']) ? (int) $_GET['id'] : null;

        header('Content-Type: application/json');
        echo json_encode([
            'exists' => $kode !== '' && $this->model->kodeExists($kode, $id),
        ]);
        exit;
    }

    private function input(): array
    {
        return [
            'kode_produk' => strtoupper(trim($_POST['kode_produk'] ?? '')),
            'nama_produk' => trim($_POST['nama_produk'] ?? ''),
            'kategori'    => trim($_POST['kategori'] ?? ''),
            'harga'       => trim($_POST['harga'] ?? ''),
            'stok'        => trim($_POST['stok'] ?? ''),
            'deskripsi'   => trim($_POST['deskripsi'] ?? ''),
        ];
    }

    private function validate(array $d, ?int $exceptId = null): array
    {
        $e = [];

        if ($d['kode_produk'] === '') {
            $e['kode_produk'] = 'Kode produk wajib diisi.';
        } elseif (!preg_match('/^[A-Z0-9\-]{3,20}$/', $d['kode_produk'])) {
            $e['kode_produk'] = 'Kode 3-20 karakter: huruf, angka, atau tanda minus.';
        } elseif ($this->model->kodeExists($d['kode_produk'], $exceptId)) {
            $e['kode_produk'] = 'Kode produk "' . $d['kode_produk'] . '" sudah terdaftar!';
        }

        if ($d['nama_produk'] === '') {
            $e['nama_produk'] = 'Nama produk wajib diisi.';
        } elseif (mb_strlen($d['nama_produk']) > 100) {
            $e['nama_produk'] = 'Nama produk maksimal 100 karakter.';
        }

        if ($d['kategori'] === '') {
            $e['kategori'] = 'Kategori wajib dipilih.';
        }

        if ($d['harga'] === '' || !is_numeric($d['harga']) || $d['harga'] < 0) {
            $e['harga'] = 'Harga wajib diisi dengan angka >= 0.';
        }

        if ($d['stok'] === '' || filter_var($d['stok'], FILTER_VALIDATE_INT) === false || $d['stok'] < 0) {
            $e['stok'] = 'Stok wajib diisi dengan bilangan bulat >= 0.';
        }

        return $e;
    }

    private function flash(string $type, string $message): void
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    }

    private function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }

    private function render(string $view, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . "/../views/$view.php";
        require __DIR__ . '/../views/layout/footer.php';
    }
}