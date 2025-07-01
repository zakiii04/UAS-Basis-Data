<?php include '../db.php';
mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran = $_GET[id]");
header("Location: index.php");
?>