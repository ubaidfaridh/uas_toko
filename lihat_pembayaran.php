<?php
session_start();
include 'koneksi.php';
$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian = pembelian.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

if (empty($detbay)){
    echo "<script>alert('Pembayaran tidak ditemukan!');</script>";
    echo "<script>location='riwayat.php';</script>";
}

if ($_SESSION["pelanggan"]['id_pelanggan']!==$detbay["id_pelanggan"]){
    echo "<script>alert('Layanan ini tidak tersedia untuk anda!');</script>";
    echo "<script>location='riwayat.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Index</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="ColoShop/styles/bootstrap4/bootstrap.min.css">
    <link href="ColoShop/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="ColoShop/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="ColoShop/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="ColoShop/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="ColoShop/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="ColoShop/styles/responsive.css">
</head>
<body>
    <?php include 'menu.php'; ?><br><br><br><br><br><br>
    <div class="container mt-5">
        <h1>Lihat Pembayaran</h1>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <th><?php echo $detbay["nama"]; ?></th>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <th><?php echo $detbay["bank"]; ?></th>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <th><?php echo $detbay["tanggal"]; ?></th>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <th>Rp<?php echo number_format($detbay["jumlah"]) ; ?></th>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
            <tr>
                <th><h4><strong>Bukti Pembayaran</strong></h4></th><br>
                <th><img src="bukti_pembayaran/<?php echo $detbay["bukti"]; ?>" alt="" class="img-responsive" style="width:400px; height:600px;"></th>
            </tr>
            </div>
        </div>
    </div>
</body>
</html>