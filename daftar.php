<?php
include 'koneksi.php';
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
<?php include 'menu.php'; ?><br><br><br>
    <div class="container">
    <br><br><br><br><br><br><br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Pendaftaran Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="text" class="form-control" name="telepon">
                        </div>
                        <button class="btn btn-primary" name="save">Simpan</button>
                    </form><br>
                    <p>Sudah memiliki akun? <a href="login.php" style="color:blue">Login Sekarang!</a></p>
                </div>

                    <?php
                    if (isset($_POST['save'])) {
                        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$_POST[email]'");
                        $sudahada = $ambil->num_rows;

                        if ($sudahada == 1) {
                            echo "<script>alert('Data sudah digunakan. Silahkan menggunakan data lain.');</script>";
                            echo "<script>location='daftar.php';</script>";
                        } else {
                            $koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan) VALUES ('$_POST[email]', '$_POST[password]', '$_POST[nama]', '$_POST[telepon]')");

                            echo "<script>alert('Berhasil mendaftar. Silahkan login.');</script>";
                            echo "<script>location='login.php';</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>