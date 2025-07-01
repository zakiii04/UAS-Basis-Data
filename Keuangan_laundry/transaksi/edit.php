<?php include '../db.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = $id"));

if ($_POST) {
    mysqli_query($conn, "UPDATE transaksi SET id_pelanggan='$_POST[id_pelanggan]', tanggal_terima='$_POST[tanggal_terima]', tanggal_selesai='$_POST[tanggal_selesai]', no_nota='$_POST[no_nota]', total_bayar='$_POST[total_bayar]', status_pembayaran='$_POST[status_pembayaran]' WHERE id_transaksi = $id");
    header("Location: index.php");
}
?>
<h2>Edit Transaksi</h2>
<form method="POST">
    ID Pelanggan: <input name="id_pelanggan" value="<?= $data['id_pelanggan'] ?>"><br>
    Tanggal Terima: <input type="date" name="tanggal_terima" value="<?= $data['tanggal_terima'] ?>"><br>
    Tanggal Selesai: <input type="date" name="tanggal_selesai" value="<?= $data['tanggal_selesai'] ?>"><br>
    No Nota: <input name="no_nota" value="<?= $data['no_nota'] ?>"><br>
    Total Bayar: <input name="total_bayar" value="<?= $data['total_bayar'] ?>"><br>
    Status:
    <select name="status_pembayaran">
        <option value="Lunas" <?= $data['status_pembayaran'] == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
        <option value="Belum Lunas" <?= $data['status_pembayaran'] == 'Belum Lunas' ? 'selected' : '' ?>>Belum Lunas</option>
    </select><br><br>
    <button type="submit">Update</button>
</form>