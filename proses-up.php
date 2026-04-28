<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   

    $keterangan = trim($_POST['keterangan']);
    $file = $_FILES['gambar'];

    if($file['error'] !== UPLOAD_ERR_OK){
        $_SESSION['error'] = 'Terjadi kesalahan saat mengunggah gambar.';
        header('Location: form_up.php');
        exit;
    }

    //validasi ukuran
    if($file['size'] > 1048576){
        $_SESSION['error'] = 'Ukuran gambar tidak boleh lebih dari 1MB.';
        header('Location: form_up.php');
        exit;
    }


    //validate
    $ekstensi = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ekstensi, ['jpg', 'jpeg', 'png'])){
        $_SESSION['error'] = 'Hanya file berjenis JG, JPEG dan PNG yang diizinkan';
        header('Location: form-up.php');
        exit;
    }

    $nama_baru= uniqid() . '_' . time() . '.' . $ekstensi;
    $tujuan = __DIR__ . '/uploads/' . $nama_baru;

    // debug pemindahan file
    // var_dump(file_exists(__DIR__ . '/uploads'));
    // var_dump($file['tmp_name']);
    // var_dump($tujuan);

    // if(move_uploaded_file($file['tmp_name'], $tujuan)){
    //     echo "BERHASIL PINDAH";
    //     exit;
    // } else{
    //     echo "GAGAL PINDAH";
    //     exit;
    // }


    if(move_uploaded_file($file['tmp_name'], $tujuan)){
        $stmt = $conn->prepare("INSERT INTO gambar(nama_file, keterangan)VALUES(?,?)");
        $stmt->bind_param("ss", $nama_baru, $keterangan);
        if($stmt->execute()){ //berhasil
            header('Location: form-up.php');
            exit;
        }else{ //gagal
           unlink($tujuan);
           $_SESSION['error']= 'Gagal menyimpan ke database';
           header('Location: form-up.php');
           exit;
        }
        $stmt->close();
    } else{
        $_SESSION['error'] = 'Gagal memindakan file';
        header('Location: form-up.php');
        exit;
    }
}else{
    header('Location: form-up.php');
    exit;
}