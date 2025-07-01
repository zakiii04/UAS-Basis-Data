<?php 
include '../db.php';

$id = $_GET['id'] ?? 0;
if ($id) {
  mysqli_query($conn, "DELETE FROM detail_transaksi WHERE id_detail = $id");
}
header("Location: index.php");
exit;
