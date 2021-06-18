<?php
$semuadata=array();
$tglm="-";
$tgls="-";
$status = "";
if(isset($_POST["kirim"])){
    $tglm = $_POST["tglm"];
    $tgls = $_POST["tgls"];
    $status = $_POST["status"];
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE status_pembelian = '$status' AND tanggal_pembelian BETWEEN '$tglm' AND '$tgls'");

    while($pecah = $ambil->fetch_assoc())
    {
        $semuadata[]=$pecah;
    }
}
?>
<h2>Laporan Pembelian</h2>
<h4>Dari tanggal <?php echo $tglm ?> sampai <?php echo $tgls ?></h4>
<hr>

<form method="post">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Awal</label>
                <input type="date" class="form-control" name="tglm" value="<?php echo $tglm ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Akhir</label>
                <input type="date" class="form-control" name="tgls" value="<?php echo $tgls ?>">
            </div>
        </div>
        <div class="col-md-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="">Pilih Status</option>
                <option value="pending" <?php echo $status=="pending"?"selected":""; ?>>PENDING</option>
                <option value="dibayar" <?php echo $status=="dibayar"?"selected":""; ?>>DIBAYAR</option>
                <option value="dikirim" <?php echo $status=="dikirim"?"selected":""; ?>>DIKIRIM</option>
            </select>
        </div>
        <div class="col-md-2">
            <label>&nbsp;</label><br>
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $total=0; ?>
        <?php foreach($semuadata as $key => $value): ?>
        <?php $total+=$value['total_pembelian']; ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value["nama_pelanggan"]; ?></td>
            <td><?php echo date("d F Y",strtotime($value["tanggal_pembelian"])) ; ?></td>
            <td><?php echo number_format($value["total_pembelian"]) ; ?></td>
            <td><?php echo $value["status_pembelian"]; ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th>Rp<?php echo number_format($total); ?></th>
        </tr>
    </tfoot>
</table>