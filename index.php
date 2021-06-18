<?php
session_start();
include 'koneksi.php';
?>

<!doctype html>
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
    <?php include 'menu.php'; ?><br><br><br><br>
    <div class="super_container">
        <div class="main-slider">
            <div id="carouselExampleControls" class="carousel slide mt-5" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../uas_toko/foto_produk/Banner-2.jpg" alt="First slide" style="width:800px;height:800px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../uas_toko/foto_produk/Banner-1.jpg" alt="Second slide" style="width:800px;height:800px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../uas_toko/foto_produk/Banner-3.jpg" alt="Third slide" style="width:800px;height:800px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div><br><br><br><hr><br><br>
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="banner_item align-items-center" style="background-image:url(foto_produk/tumpeng.jpg)">
                            <div class="banner_category">
                                <a href="categories.html">Makanan Berat</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="banner_item align-items-center" style="background-image:url(foto_produk/martabak.jpg)">
                            <div class="banner_category">
                                <a href="categories.html">Makanan Ringan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="banner_item align-items-center" style="background-image:url(foto_produk/es-doger.jpg)">
                            <div class="banner_category">
                                <a href="categories.html">Minuman</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="new_arrivals">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="section_title new_arrivals_title">
                            <h2>New Arrivals</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                        <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
                        <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
                            <div class="product-item mt-5 ml-4 mr-4">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" style="width:220px;height:250px;">
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="single.html"><?php echo $perproduk['nama_produk']; ?></a></h6>
                                        <div class="product_price">Rp. <?php echo number_format($perproduk['harga_produk']); ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="red_button add_to_cart_button"><a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">Beli</a></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="red_button add_to_cart_button"><a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">Detail</a></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="ColoShop/js/jquery-3.2.1.min.js"></script>
    <script src="ColoShop/styles/bootstrap4/popper.js"></script>
    <script src="ColoShop/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="ColoShop/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="ColoShop/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="ColoShop/plugins/easing/easing.js"></script>
    <script src="ColoShop/js/custom.js"></script>
</body>

</html>