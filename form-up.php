<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Upload Gambar</h4>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['error']; unset($_SESSION['error'])?>
                            </div>
                            <?php endif; ?>
                        <form action="proses-up.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" maxlength="250" required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Keterangan</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg, .jpeg, .png" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <a href="galeri.php" class="btn btn-secondary">Lihat Gallery</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>