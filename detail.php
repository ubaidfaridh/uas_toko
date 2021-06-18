<?php
session_start();
include 'koneksi.php';
$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$detail = $ambil->fetch_assoc();

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
    <?php include 'menu.php'; ?><br><br><br><br><br><br><br><br>
    <div class="container">
        <h1>Detail Produk</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" class="img-responsive" alt="" style="width:400px; height:200px;">
            </div>
            <div class="col-md-6">
                <h2><?php echo $detail['nama_produk']; ?></h2>
                <h4>Rp<?php echo number_format($detail['harga_produk']); ?></h4>
                <h5>Stok: <?php echo $detail["stok_produk"]; ?></h5>
                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk']; ?>">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" name="beli">Beli</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST["beli"])) {
                    $jumlah = $_POST["jumlah"];
                    $_SESSION["keranjang"][$id_produk] = $jumlah;

                    echo "<script>alert('Produk telah dimasukkan keranjang!');</script>";
                    echo "<script>location='keranjang.php';</script>";
                }
                ?>
                <p><?php echo $detail["deskripsi_produk"]; ?></p>
            </div>
        </div>
    </div>
</body>

</html>