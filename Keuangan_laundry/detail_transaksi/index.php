
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4"><i class="fa fa-file-invoice"></i> Detail Transaksi</h3>
    <a href="tambah.php" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Tambah Detail</a>
    <table class="table table-bordered table-striped">
        <thead class="table-primary text-center">
            <tr>
                <th>ID</th>
                <th>ID Transaksi</th>
                <th>ID Layanan</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="align-middle text-center">
            <?php
            include '../db.php';
            $query = mysqli_query($conn, "SELECT * FROM detail_transaksi");
            while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $data['id_detail']; ?></td>
                <td><?php echo $data['id_transaksi']; ?></td>
                <td><?php echo $data['id_layanan']; ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td>Rp <?php echo number_format($data['subtotal'], 0, ',', '.'); ?></td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="edit.php?id=<?php echo $data['id_detail']; ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="hapus.php?id=<?php echo $data['id_detail']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus detail ini?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="../index.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali ke Dashboard</a>
</div>
</body>
</html>
