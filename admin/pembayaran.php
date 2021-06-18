<h2>Data Pembayaran</h2>

<?php
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

echo"<pre>";
print_r($detail);
echo"</pre>";
?>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <th><?php echo $detail['nama']; ?></th>
            </tr>
            <tr>
                <th>Bank</th>
                <th><?php echo $detail['bank']; ?></th>
            </tr>
            <tr>
                <th>Jumlah</th>
                <th>Rp.<?php echo number_format( $detail['jumlah']); ?></th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th><?php echo $detail['tanggal']; ?></th>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
    </div>
</div>

<form method="post">
    <div class="form-group">
        <label>No. Resi Pengiriman</label>
        <input type="text" name="resi" class="form-control">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="">Pilih Status</option>
            <option value="lunas">Lunas</option>
            <option value="dikirim">Barang Dikirim</option>
            <option value="batal">Batal</option>
        </select>
    </div>
    <button class="btn btn-primary" name="kirim">KIRIM</buttton>
</form>

<?php
if (isset($_POST["kirim"]))
{
    $resi = $_POST["resi"];
    $status = $_POST["status"];
    $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian ='$id_pembelian'");

    echo "<script>alert('Data pembelian telah selesai diupdate!');</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>