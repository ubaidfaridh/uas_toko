<?php
session_start();
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
<?php include 'menu.php'; ?>
    <div class="container">
    <br><br><br><br><br><br><br><br><br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Login Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button class="btn btn-primary" name="login">Login</button>
                        </form><br>
                        <p>Belum memiliki akun? <a href="daftar.php" style="color:blue">Daftar Sekarang!</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <?php 
        if(isset($_POST['login'])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
            $valid = $ambil->num_rows;

            if ($valid==1){
                $akun = $ambil->fetch_assoc();
                $_SESSION["pelanggan"] = $akun;
                echo "<script>alert('Berhasil Login!');</script>";
                if(isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])){
                    echo "<script>location='checkout.php';</script>";
                }else{
                    echo "<script>location='riwayat.php';</script>";

                }
            }else{
                echo "<script>alert('Anda gagal melakukan login, periksa akun anda');</script>";
                echo "<script>location='login.php';</script>";
            }
        }
    ?>
</body>

</html>