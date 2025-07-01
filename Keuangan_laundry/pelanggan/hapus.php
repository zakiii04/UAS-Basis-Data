
<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan = $id");

    if (!$query) {
        die("Gagal menghapus: " . mysqli_error($conn));
    }
}

header("Location: index.php");
?>
