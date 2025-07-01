
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4"><i class="fa fa-plus-circle"></i> Tambah Transaksi Laundry</h3>
    <form action="" method="post" class="border p-4 rounded bg-light shadow-sm">
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
            <input type="number" name="id_pelanggan" id="id_pelanggan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_terima" class="form-label">Tanggal Terima</label>
            <input type="date" name="tanggal_terima" id="tanggal_terima" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="no_nota" class="form-label">No Nota</label>
            <input type="text" name="no_nota" id="no_nota" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="total_bayar" class="form-label">Total Bayar (Rp)</label>
            <input type="number" name="total_bayar" id="total_bayar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="form-select" required>
                <option value="Lunas">Lunas</option>
                <option value="Belum Lunas">Belum Lunas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        <a href="index.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </form>

    <?php
    include '../db.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_pelanggan = intval($_POST['id_pelanggan']);
        $tanggal_terima = $_POST['tanggal_terima'];
        $tanggal_selesai = $_POST['tanggal_selesai'];
        $no_nota = mysqli_real_escape_string($conn, $_POST['no_nota']);
        $total_bayar = intval($_POST['total_bayar']);
        $status = mysqli_real_escape_string($conn, $_POST['status_pembayaran']);

        $query = mysqli_query($conn, "INSERT INTO transaksi (id_pelanggan, tanggal_terima, tanggal_selesai, no_nota, total_bayar, status_pembayaran) 
                    VALUES ($id_pelanggan, '$tanggal_terima', '$tanggal_selesai', '$no_nota', $total_bayar, '$status')");

        if ($query) {
            echo "<div class='alert alert-success mt-3'>Transaksi berhasil ditambahkan!</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal menambahkan transaksi: " . mysqli_error($conn) . "</div>";
        }
    }
    ?>
</div>
</body>
</html>
