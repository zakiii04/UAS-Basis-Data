<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Swiss Van Java Laundry</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="pelanggan/index.php" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> Data Pelanggan</a>
                    <a href="layanan/index.php" class="list-group-item list-group-item-action"><i class="fa fa-broom"></i> Layanan</a>
                    <a href="transaksi/index.php" class="list-group-item list-group-item-action"><i class="fa fa-exchange-alt"></i> Transaksi</a>
                    <a href="detail_transaksi/index.php" class="list-group-item list-group-item-action"><i class="fa fa-file-invoice"></i> Detail Transaksi</a>
                    <a href="pembayaran/index.php" class="list-group-item list-group-item-action"><i class="fa fa-money-bill-wave"></i> Pembayaran</a>
                    <a href="laporan.php" class="list-group-item list-group-item-action"><i class="fa fa-chart-line"></i> Laporan Transaksi</a>
                </div>
            </div>

            <div class="col-md-9">
                <h3>Swiss Van Java Laundry</h3>
                <?php
                include 'db.php';
                $result_pelanggan = mysqli_query($conn, "SELECT COUNT(*) AS total FROM pelanggan");
                $row_pelanggan = mysqli_fetch_assoc($result_pelanggan);
                $total_pelanggan = $row_pelanggan['total'];

                $result_layanan = mysqli_query($conn, "SELECT COUNT(*) AS total FROM layanan");
                $row_layanan = mysqli_fetch_assoc($result_layanan);
                $total_layanan = $row_layanan['total'];
                ?>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-users"></i> Total Pelanggan</h5>
                                <div class="d-flex align-items-center justify-content-center" style="height: 50px;"><span class="fs-4 fw-bold"><?php echo $total_pelanggan; ?></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-receipt"></i> Transaksi Hari Ini</h5>
                                <div class="d-flex align-items-center justify-content-center" style="height: 50px;">
                                    <?php
                                    $today = date("Y-m-d");
                                    $result_trx = mysqli_query($conn, "SELECT COUNT(*) AS total FROM transaksi WHERE tanggal_terima = '$today'");
                                    $trx_today = mysqli_fetch_assoc($result_trx);
                                    echo "<span class='fs-4 fw-bold'>" . $trx_today["total"] . "</span>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-box"></i> Layanan Tersedia</h5>
                                <div class="d-flex align-items-center justify-content-center" style="height: 50px;"><span class="fs-4 fw-bold"><?php echo $total_layanan; ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-muted">Bismillah.</p>
            </div>
        </div>
    </div>
</body>
</html>
