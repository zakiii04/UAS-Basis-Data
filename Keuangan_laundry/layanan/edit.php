<?php include '../db.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM layanan WHERE id_layanan = $id"));

if ($_POST) {
    mysqli_query($conn, "UPDATE layanan SET nama_layanan='$_POST[nama_layanan]', jenis='$_POST[jenis]', harga='$_POST[harga]' WHERE id_layanan = $id");
    header("Location: index.php");
}
?>
<form method="POST">
    Nama Layanan: <input name="nama_layanan" value="<?= $data['nama_layanan'] ?>"><br>
    Jenis:
    <select name="jenis">
        <option value="Satuan" <?= $data['jenis'] == 'Satuan' ? 'selected' : '' ?>>Satuan</option>
        <option value="Kiloan" <?= $data['jenis'] == 'Kiloan' ? 'selected' : '' ?>>Kiloan</option>
    </select><br>
    Harga: <input name="harga" value="<?= $data['harga'] ?>"><br>
    <button type="submit">Update</button>
</form>