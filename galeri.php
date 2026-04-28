<?php
session_start();
require_once 'config.php';
// Ambil semua data gambar
$result = $conn->query("SELECT * FROM gambar ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Gambar</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
        }
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .navbar {
            border-radius: 12px;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📸 Galeri Gambar</h2>
        <a href="form-up.php" class="btn btn-success shadow-sm">+ Tambah</a>
    </div>

    <!-- Alert -->
    <?php if (isset($_GET['status'])): ?>
        <div class="alert alert-<?= $_GET['status'] == 'error' ? 'danger' : 'success' ?> alert-dismissible fade show">
            <?php if ($_GET['status'] == 'success'): ?>
                Gambar berhasil diupload
            <?php elseif ($_GET['status'] == 'deleted'): ?>
                Gambar berhasil dihapus
            <?php elseif ($_GET['status'] == 'updated'): ?>
                Keterangan diperbarui
            <?php else: ?>
                Terjadi kesalahan
            <?php endif; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Grid -->
    <div class="row g-4">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow-sm">

                        <img src="uploads/<?= $row['nama_file'] ?>" 
                             alt="<?= htmlspecialchars($row['keterangan']) ?>" 
                             class="card-img-top">

                        <div class="card-body">
                            <p class="card-text text-muted small mb-2">
                                <?= htmlspecialchars($row['keterangan']) ?>
                            </p>
                        </div>

                        <div class="card-footer bg-white border-0 d-flex justify-content-between">
                            <a href="edit-ket.php?id=<?= $row['id'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" 
                               class="btn btn-outline-danger btn-sm"
                               onclick="return confirm('Yakin?')">Hapus</a>
                        </div>

                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col text-center">
                <div class="alert alert-info">Belum ada gambar 😅</div>
            </div>
        <?php endif; ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>