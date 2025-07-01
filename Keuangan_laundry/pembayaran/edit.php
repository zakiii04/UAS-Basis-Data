<?php include '../db.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran = $id"));

if ($_POST) {
    mysqli_query($conn, "UPDATE pembayaran SET id_transaksi='$_POST[id_transaksi]', tanggal_bayar='$_POST[tanggal_bayar]', jumlah_bayar='$_POST[jumlah_bayar]' WHERE id_pembayaran = $id");
    header("Location: index.php");
}
?>
<h2>Edit Pembayaran</h2>
<form method="POST">
    ID Transaksi: <input name="id_transaksi" value="<?= $data['id_transaksi'] ?>"><br>
    Tanggal Bayar: <input type="date" name="tanggal_bayar" value="<?= $data['tanggal_bayar'] ?>"><br>
    Jumlah Bayar: <input name="jumlah_bayar" value="<?= $data['jumlah_bayar'] ?>"><br><br>
    <button type="submit">Update</button>
</form>