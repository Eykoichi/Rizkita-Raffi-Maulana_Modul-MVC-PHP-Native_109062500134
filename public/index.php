<?php
session_start();

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

require_once __DIR__ . '/../app/controllers/ProdukController.php';

$controller = new ProdukController();
$action     = $_GET['action'] ?? 'index';
$isPost     = $_SERVER['REQUEST_METHOD'] === 'POST';

switch ($action) {
    case 'index':   $controller->index(); break;
    case 'create':  $controller->create(); break;
    case 'store':   $isPost ? $controller->store()   : header('Location: index.php'); break;
    case 'edit':    $controller->edit(); break;
    case 'update':  $isPost ? $controller->update()  : header('Location: index.php'); break;
    case 'destroy': $isPost ? $controller->destroy() : header('Location: index.php'); break;
    case 'cek_kode': $controller->cekKode(); break;
    default:
        http_response_code(404);
        echo '404 - Halaman tidak ditemukan';
}