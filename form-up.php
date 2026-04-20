<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Upload Gambar</h4>
                    </div>
                    <div class="card-body">
                        <form action="proses_upload.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" maxlength="250" required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Keterangan</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg, .jpeg, .png" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <a href="gallery.php" class="btn btn-secondary">Lihat Gallery</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>