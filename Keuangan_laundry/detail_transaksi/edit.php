<?php 
include '../db.php';

$id = $_GET['id'] ?? 0;
if (!$id) {
  header("Location: index.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_transaksi = $_POST['id_transaksi'];
  $id_layanan = $_POST['id_layanan'];
  $jumlah = $_POST['jumlah'];
  $subtotal = $_POST['subtotal'];

  mysqli_query($conn, "UPDATE detail_transaksi SET id_transaksi=$id_transaksi, id_layanan=$id_layanan, jumlah=$jumlah, subtotal=$subtotal WHERE id_detail=$id");
  header("Location: index.php");
  exit;
}

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM detail_transaksi WHERE id_detail = $id"));
?>

<h2>Edit Detail Transaksi</h2>
<form method="POST">
  <label for="id_transaksi">ID Transaksi:</label><br>
  <input type="number" name="id_transaksi" value="<?= $data['id_transaksi'] ?>" required><br><br>

  <label for="id_layanan">ID Layanan:</label><br>
  <input type="number" name="id_layanan" value="<?= $data['id_layanan'] ?>" required><br><br>

  <label for="jumlah">Jumlah (Kg/Pcs):</label><br>
  <input type="number" step="0.01" name="jumlah" value="<?= $data['jumlah'] ?>" required><br><br>

  <label for="subtotal">Subtotal:</label><br>
  <input type="number" step="0.01" name="subtotal" value="<?= $data['subtotal'] ?>" required><br><br>

  <button type="submit">Update</button>
</form>
