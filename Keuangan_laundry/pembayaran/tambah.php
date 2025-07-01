<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4"><i class="fa fa-money-bill-wave"></i> Tambah Pembayaran</h3>
        <form action="" method="post" class="border p-4 rounded bg-light shadow-sm">
            <div class="mb-3">
                <label for="id_transaksi" class="form-label">ID Transaksi</label>
                <input type="number" name="id_transaksi" id="id_transaksi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_bayar" class="form-label">Jumlah Bayar (Rp)</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <a href="index.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </form>

        <?php
        include '../db.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_transaksi = mysqli_real_escape_string($conn, $_POST['id_transaksi']);
            $tanggal_bayar = mysqli_real_escape_string($conn, $_POST['tanggal_bayar']);
            $jumlah_bayar = mysqli_real_escape_string($conn, $_POST['jumlah_bayar']);

            $query = "INSERT INTO pembayaran (id_transaksi, tanggal_bayar, jumlah_bayar) 
                      VALUES ('$id_transaksi', '$tanggal_bayar', '$jumlah_bayar')";

            if (mysqli_query($conn, $query)) {
                // Update status transaksi jadi lunas otomatis
                mysqli_query($conn, "UPDATE transaksi SET status_pembayaran='Lunas' WHERE id_transaksi='$id_transaksi'");
                echo "<div class='alert alert-success mt-3'>Pembayaran berhasil ditambahkan & status diperbarui menjadi <b>Lunas</b>.</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Gagal menambahkan pembayaran: " . mysqli_error($conn) . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
