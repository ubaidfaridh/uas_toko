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
<?php include 'menu.php'; ?><br><br><br><br><br><br>
        <div class="container mt-5">

            <h1>Detail Pembelian</h1>

            <?php
            $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>

            <?php
            $idpelangganbeli = $detail["id_pelanggan"];
            $idpelangganlogin = $_SESSION["pelanggan"]["id_pelanggan"];

            if($idpelangganbeli!=$idpelangganlogin){
                echo "<script>alert('Jangan nakal yaa!');</script>";
                echo "<script>location='riwayat.php';</script>";
                exit();
            }
            ?>

            <div class="row">
                <div class="col-md-4">
                    <h3>Identitas Pelanggan</h3>
                    <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
                    <p>
                        <?php echo $detail['telepon_pelanggan']; ?><br>
                        <?php echo $detail['email_pelanggan']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <p>
                        Tanggal Pembelian: <?php echo $detail['tanggal_pembelian']; ?><br>
                        Total Pembelian: <?php echo $detail['total_pembelian']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <strong><?php echo $detail['nama_kota']; ?></strong><br>
                    Ongkos kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
                    Alamat pengiriman: <strong><?php echo $detail['alamat_pengiriman']; ?></strong>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Berat Produk</th>
                        <th>Jumlah</th>
                        <th>Sub Berat</th>
                        <th>Sub Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1 ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td>Rp<?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo $pecah['berat']; ?> kg</td>
                            <td><?php echo $pecah['jumlah']; ?></td>
                            <td><?php echo $pecah['subberat']; ?> kg</td>
                            <td>Rp<?php echo number_format($pecah['subharga']); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-8">
                    <div class="alert alert-info">
                        <p>
                            Silahkan melakukan pembayaran sebesar Rp.<?php echo number_format($detail['total_pembelian']); ?>
                            <br>
                            <strong>BANK BRI - 6119 0101 9812 538 AN. Firdaus Irwanto</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>