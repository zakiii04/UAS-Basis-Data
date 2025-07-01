<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4">Laporan Transaksi</h3>
    <a href="index.php" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>No Nota</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Terima</th>
                <th>Tanggal Selesai</th>
                <th>Nama Layanan</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Total Bayar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $query = "
            SELECT 
                t.no_nota,
                p.nama AS nama_pelanggan,
                t.tanggal_terima,
                t.tanggal_selesai,
                l.nama_layanan,
                l.jenis,
                dt.jumlah,
                l.harga,
                dt.subtotal,
                t.total_bayar,
                t.status_pembayaran
            FROM transaksi t
            JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
            JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi
            JOIN layanan l ON dt.id_layanan = l.id_layanan
            ORDER BY t.tanggal_terima DESC
        ";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['no_nota']}</td>
                <td>{$row['nama_pelanggan']}</td>
                <td>{$row['tanggal_terima']}</td>
                <td>{$row['tanggal_selesai']}</td>
                <td>{$row['nama_layanan']}</td>
                <td>{$row['jenis']}</td>
                <td>{$row['jumlah']}</td>
                <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                <td>Rp " . number_format($row['subtotal'], 0, ',', '.') . "</td>
                <td>Rp " . number_format($row['total_bayar'], 0, ',', '.') . "</td>
                <td>{$row['status_pembayaran']}</td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
