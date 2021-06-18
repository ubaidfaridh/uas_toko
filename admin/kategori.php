<h3>Data Kategori</h3>
<hr>

<?php 
$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while($pecah = $ambil->fetch_assoc())
{
    $semuadata[] = $pecah;
}
?>
<a href="" class="btn btn-primary">Tambah Kategori</a>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
    <?php foreach ($semuadata as $key => $value): ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $value["nama_kategori"] ?></td>
            <td>
                <a href="" class="btn btn-warning">Ubah</a>
                <a href="" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php $nomor++; ?>
    <?php endforeach ?>
    </tbody>
</table>