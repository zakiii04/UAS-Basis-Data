
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4"><i class="fa fa-exchange-alt"></i> Data Transaksi</h3>
        <a href="tambah.php" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Tambah Transaksi</a>
        <table class="table table-bordered table-striped">
            <thead class="table-primary text-center">
                <tr>
                    <th>ID</th>
                    <th>ID Pelanggan</th>
                    <th>Tanggal Terima</th>
                    <th>Selesai</th>
                    <th>No Nota</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="align-middle text-center">
                <?php
                include '../db.php';
                $query = mysqli_query($conn, "SELECT * FROM transaksi");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $data['id_transaksi']; ?></td>
                    <td><?php echo $data['id_pelanggan']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($data['tanggal_terima'])); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($data['tanggal_selesai'])); ?></td>
                    <td><?php echo $data['no_nota']; ?></td>
                    <td>Rp <?php echo number_format($data['total_bayar'], 0, ',', '.'); ?></td>
                    <td>
                        <span class="badge bg-<?php echo strtolower($data['status_pembayaran']) === 'lunas' ? 'success' : 'warning'; ?>">
                            <?php echo ucfirst($data['status_pembayaran']); ?>
                        </span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="edit.php?id=<?php echo $data['id_transaksi']; ?>" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="hapus.php?id=<?php echo $data['id_transaksi']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus transaksi ini?')">
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
