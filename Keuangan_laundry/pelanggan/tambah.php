
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4"><i class="fa fa-user-plus"></i> Tambah Data Pelanggan</h3>
        <form action="" method="post" class="border p-4 rounded bg-light shadow-sm">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No. HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            <a href="index.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </form>

        <?php
        include '../db.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = mysqli_real_escape_string($conn, $_POST['nama']);
            $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
            $query = mysqli_query($conn, "INSERT INTO pelanggan (nama, no_hp) VALUES ('$nama', '$no_hp')");
            if ($query) {
                echo "<div class='alert alert-success mt-3'>Data berhasil ditambahkan!</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Gagal menambah data: " . mysqli_error($conn) . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
