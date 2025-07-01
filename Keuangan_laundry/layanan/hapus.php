<?php
include '../db.php';
mysqli_query($conn, "DELETE FROM layanan WHERE id_layanan = $_GET[id]");
header("Location: index.php");
?>