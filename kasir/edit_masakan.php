<?php 
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM masakan WHERE id_masakan='$id'");
$pecah = $ambil->fetch_assoc();
 ?>
<h1>Edit Masakan</h1>
<form method="POST">
	<div class="form-group">
		<label for="">Nama</label>
		<input type="text" name="nama" value="<?php echo $pecah['nama_masakan'] ?>" class="form-control">
	</div>
	<div class="form-group">
		<label for="">Harga</label>
		<input type="number" name="harga" value="<?php echo $pecah['harga'] ?>" class="form-control">
	</div>
	<div class="form-group">
		<label for="">Foto Makanan</label>
		<br>
		<img src="../inc/img/<?php echo $pecah['foto_makanan'] ?>" width="30%">'
		<br>
		<input type="file" name="foto" value="<?php echo $pecah['nama_masakan'] ?>" class="form-control">
	</div>
	<div class="form-group">
		<label for="">Status</label>
		<select name="status" class="form-control">
		<option <?php if( $pecah['status_masakan']=='Tersedia'){echo "selected"; } ?> value="Tersedia">Tersedia</option>
		<option <?php if( $pecah['status_masakan']=='Kosong'){echo "selected"; } ?> value="Kosong">Kosong</option>
		</select>
	</div>
	<button type="submit" name="edit" class="btn btn-success">Update</button>
</form>
<?php 
if (isset($_POST['edit'])) {
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$status = $_POST['status'];
	$namafoto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	if (!empty($lokasi)) {
		move_uploaded_file($lokasi, "../inc/img/$namafoto");

		$koneksi->query("UPDATE masakan SET nama_masakan='$nama', harga='$harga', foto_makanan='$nama_foto', status_masakan='$status' WHERE id_masakan='$id' ");
	}else {
		$koneksi->query("UPDATE masakan SET nama_masakan='$nama', harga='$harga', status_masakan='$status' WHERE id_masakan='$id' ");
	}
	echo "<script>alert('Data Berhasil Diubah')</script>";
	echo "<script>location='index.php?halaman=list'</script>";
}
 ?>