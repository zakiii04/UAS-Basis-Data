
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        td.id-transaksi, th.id-transaksi {
            width: 100px;
            white-space: nowrap;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4"><i class="fa fa-money-bill-wave"></i> Data Pembayaran</h3>
    <a href="tambah.php" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Tambah Pembayaran</a>
    <table class="table table-bordered table-striped table-sm">
        <thead class="table-primary text-center">
            <tr>
                <th class="id-transaksi">ID Transaksi</th>
                <th>Tanggal Bayar</th>
                <th>Jumlah Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="align-middle text-center">
            <?php
            include '../db.php';
            $query = mysqli_query($conn, "SELECT * FROM pembayaran");
            while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td class="id-transaksi"><?php echo $data['id_transaksi']; ?></td>
                <td><?php echo date('d/m/Y', strtotime($data['tanggal_bayar'])); ?></td>
                <td>Rp <?php echo number_format($data['jumlah_bayar'], 0, ',', '.'); ?></td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="edit.php?id=<?php echo $data['id_pembayaran']; ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="hapus.php?id=<?php echo $data['id_pembayaran']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus pembayaran ini?')">
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
