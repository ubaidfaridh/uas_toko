<?php 
session_start();
include 'koneksi.php';
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])){
    echo "<script>alert('Anda harus Login terlebih dahulu!');</script>";
    echo "<script>location='login.php';</script>";
}

$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_beli = $detpem["id_pelanggan"];
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login != $id_pelanggan_beli){
    echo "<script>alert('Jangan Nakal!');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
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
        <h1>Konfirmasi Pembayaran</h1>
        <p>Kirim bukti pembayaran</p>
        <div class="alert alert-info">Total tagihan anda sebesar <strong>Rp. <?php echo number_format($detpem['total_pembelian']) ?></strong> </div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Penyetor</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>
            <div class="form-group">
                <label>Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-info">foto bukti harus JPG maksimal 2Mb</p>
            </div>
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>
    <?php
    if(isset($_POST["kirim"])){
        $namabukti = $_FILES["bukti"]["name"];
        $lokasibukti = $_FILES["bukti"]["tmp_name"];
        $namafiks = date("YmdHis").$namabukti;
        move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        $tanggal = date("Y-m-d");

        $koneksi->query("INSERT INTO pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

        $koneksi->query("UPDATE pembelian SET status_pembelian='dibayar' WHERE id_pembelian='$idpem'");

        echo "<div class='alert alert-info'>Data Pembayaran telah tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=riwayat.php'>";
    }
    ?>
</body>
</html>