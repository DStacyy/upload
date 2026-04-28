<?php
session_start();
require_once 'config.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Ambil nama file dari database
    $stmt = $conn->prepare("SELECT nama_file FROM gambar WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $file = 'uploads/' . $row['nama_file'];
        // Hapus file dari folder
        if (file_exists($file)) {
            unlink($file);
        }
        // Hapus dari database
        $stmtDelete = $conn->prepare("DELETE FROM gambar WHERE id = ?");
        $stmtDelete->bind_param("i", $id);
        if ($stmtDelete->execute()) {
            header('Location: galeri.php?status=deleted');
            exit;
        } else {
            $_SESSION['error'] = 'Gagal menghapus dari database.';
            header('Location: galeri.php');
            exit;
        }
        $stmtDelete->close();
    } else {
        $_SESSION['error'] = 'Data tidak ditemukan.';
        header('Location: galeri.php');
        exit;
    }
    $stmt->close();
} else {
    header('Location: galeri.php');
    exit;
}
?>