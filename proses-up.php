<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keterangan = trim($_POST['keterangan']);
    $file = $_FILES['gambar'];

    if($file['error'] !== UPLOAD_ERR_OK){
        $_SESSION['error'] = 'Terjadi kesalahan saat mengunggah gambar.';
        header('Location: form_upload.php');
        exit;
    }

    //validasi ukuran
    if($file['size'] > 1048576){
        $_SESSION['error'] = 'Ukuran gambar tidak boleh lebih dari 1MB.';
        header('Location: form_upload.php');
        exit;
    }
}

    //validate
    $ekstensi = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ekstensi, ['jpg', 'jpeg', 'png'])){
        $_SESSION['error'] = 'Hanya file berjenis JG, JPEG dan PNG yang diizinkan';
        header('Location: form-up.php');
        exit;
}

$nama_baru= uniqid() . '_' . time() . '.' . $ekstensi;
$tujuan = 'uploads/' . $nama_baru;