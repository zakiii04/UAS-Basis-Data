<?php include '../db.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = $id"));

if ($_POST) {
    mysqli_query($conn, "UPDATE pelanggan SET nama='$_POST[nama]', no_hp='$_POST[no_hp]' WHERE id_pelanggan = $id");
    header("Location: index.php");
}
?>
<form method="POST">
    Nama: <input name="nama" value="<?= $data['nama'] ?>"><br>
    No HP: <input name="no_hp" value="<?= $data['no_hp'] ?>"><br>
    <button type="submit">Update</button>
</form>