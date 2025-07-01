<?php
include '../db.php';

$id = $_GET['id'];

// Get transaction info
$transaksi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM transaksi 
    JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan 
    WHERE transaksi.id_transaksi = '$id'"));

// Get detail items
$detail = mysqli_query($conn, "SELECT * FROM detail_transaksi 
    JOIN layanan ON detail_transaksi.id_layanan = layanan.id_layanan 
    WHERE id_transaksi = '$id'");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Nota Laundry</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid black; padding: 8px; text-align: left; }
        .header-table td { border: none; }
        .center { text-align: center; }
    </style>
</head>
<body>
    <h2>Swiss Van Java Laundry</h2>
    <table class='header-table'>
        <tr><td>Alamat:</td><td>Jl. Cijat Asri No.9, Tarogong Kidul, Garut</td></tr>
        <tr><td>Telepon:</td><td>0852 2227 4585</td></tr>
        <tr><td>Tanggal Terima:</td><td><?= $transaksi['tgl_terima'] ?></td></tr>
        <tr><td>Tanggal Selesai:</td><td><?= $transaksi['tgl_selesai'] ?></td></tr>
    </table>

    <br>
    <table class='header-table'>
        <tr><td>Nama:</td><td><?= $transaksi['nama'] ?></td></tr>
        <tr><td>Alamat:</td><td><?= $transaksi['alamat'] ?></td></tr>
        <tr><td>Telepon:</td><td><?= $transaksi['telepon'] ?></td></tr>
    </table>

    <br>
    <table>
        <tr>
            <th>Jenis Pakaian</th>
            <th>Jumlah / Potong</th>
            <th>Harga (Rp.)</th>
        </tr>

        <?php 
        $total = 0;
        while ($row = mysqli_fetch_assoc($detail)) { 
            $subtotal = $row['jumlah'] * $row['harga'];
            $total += $subtotal;
        ?>
        <tr>
            <td><?= $row['nama_layanan'] ?></td>
            <td><?= $row['jumlah'] ?></td>
            <td><?= number_format($subtotal, 0, ',', '.') ?></td>
        </tr>
        <?php } ?>
        <tr>
            <th colspan="2">Jumlah Total</th>
            <th>Rp. <?= number_format($total, 0, ',', '.') ?></th>
        </tr>
    </table>

    <br><br>
    <div class='center'>
        <p><strong>Perhatian:</strong></p>
        <ul style='text-align: left; display: inline-block;'>
            <li>Pengambilan barang harus disertai nota</li>
            <li>Klaim berlaku 24 jam setelah barang diambil</li>
            <li>Kain luntur, berkerut karena sifat kain di luar tanggungan</li>
            <li>Cucian yang tidak diambil dalam waktu 2 bulan bila rusak/hilang bukan tanggung jawab kami</li>
        </ul>

        <br><br>
        <p>Customer,</p>
        <br><br>
        <p>Hormat Kami,</p>
    </div>
</body>
</html>
