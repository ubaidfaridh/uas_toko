<h2>Tambah Pelanggan</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>EMAIL</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>PASSWORD</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label>NAMA PELANGGAN</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>TELEPON PELANGGAN</label>
        <input type="text" class="form-control" name="telepon">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) 
{

    $koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan) VALUES ('$_POST[email]', '$_POST[password]', '$_POST[nama]', '$_POST[telepon]')");

    echo "<div class='alert alert-info'>Data Pelanggan Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>