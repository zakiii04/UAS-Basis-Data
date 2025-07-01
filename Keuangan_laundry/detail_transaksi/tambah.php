
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4"><i class="fa fa-plus-circle"></i> Tambah Detail Transaksi</h3>
    <form action="" method="post" class="border p-4 rounded bg-light shadow-sm">
        <div class="mb-3">
            <label for="id_transaksi" class="form-label">ID Transaksi</label>
            <input type="number" name="id_transaksi" id="id_transaksi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_layanan" class="form-label">ID Layanan</label>
            <input type="number" name="id_layanan" id="id_layanan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal (Rp)</label>
            <input type="number" name="subtotal" id="subtotal" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        <a href="index.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </form>

    <?php
    include '../db.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_transaksi = intval($_POST['id_transaksi']);
        $id_layanan = intval($_POST['id_layanan']);
        $jumlah = intval($_POST['jumlah']);
        $subtotal = intval($_POST['subtotal']);

        $query = mysqli_query($conn, "INSERT INTO detail_transaksi (id_transaksi, id_layanan, jumlah, subtotal) 
                                      VALUES ($id_transaksi, $id_layanan, $jumlah, $subtotal)");

        if ($query) {
            echo "<div class='alert alert-success mt-3'>Detail transaksi berhasil ditambahkan!</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal menambahkan detail: " . mysqli_error($conn) . "</div>";
        }
    }
    ?>
</div>
</body>
</html>
