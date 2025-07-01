<?php include '../db.php';
mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = $_GET[id]");
header("Location: index.php");
?>