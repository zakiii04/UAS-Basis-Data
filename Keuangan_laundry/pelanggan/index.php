
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4"><i class="fa fa-users"></i> Data Pelanggan</h2>
        <a href="tambah.php" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Tambah Pelanggan</a>
        <table class="table table-striped table-bordered">
            <thead class="table-primary text-center">
                <tr>
                    <th>id_pelanggan</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="align-middle text-center">
                <?php
                include '../db.php';
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM pelanggan");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['no_hp']; ?></td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href='edit.php?id=<?php echo $data["id_pelanggan"]; ?>' class='btn btn-warning btn-sm'>
                                <i class='fa fa-edit'></i>
                            </a>
                            <a href='hapus.php?id=<?php echo $data["id_pelanggan"]; ?>' class='btn btn-danger btn-sm' onclick="return confirm('Yakin hapus data ini?')">
                                <i class='fa fa-trash'></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href='../index.php' class='btn btn-secondary mt-3'><i class='fa fa-arrow-left'></i> Kembali ke Dashboard</a>
    </div>
</body>
</html>
