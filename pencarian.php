<?php include 'koneksi.php'; ?>
<?php
$keyword = $_GET["keyword"];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc()) {
    $semuadata[] = $pecah;
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
    <div class="row mt-5 no-gutters">

        <div class="container">
            <h1>Hasil Pencarian : <?php echo $keyword; ?></h1>
            <?php if (empty($semuadata)) : ?>
                <div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
            <?php endif ?>
            <div class="row">
                <?php foreach ($semuadata as $key => $value) : ?>
                    <div class="col-md-3 mt-4 ml-5 mr-4">
                        <div class="card" style="width:18rem;">
                            <img src="foto_produk/<?php echo $value['foto_produk']; ?>" style="width:285px;height:200px;">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $value['nama_produk']; ?></h3>
                                <h5 class="card-text">Rp. <?php echo number_format($value['harga_produk']); ?></h5>
                                <a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
                                <a href="detail.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-default">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>

</html>