<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM tb_user WHERE id_user='$id'");
$data = $ambil->fetch_assoc();
 ?>
<form method="post">
  <div class="form-group">
    <label>Nama User</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_user']; ?>">
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>">
  </div>
  <div class="form-group">
    <label>Hak Akses</label>
    <select class="form-control" name="hak_akses">

        <option <?php if( $data['id_level']=='3'){echo "selected"; } ?> value="3">Admin</option>
        <option <?php if( $data['id_level']=='1'){echo "selected"; } ?> value="1">Kasir</option>
        <option <?php if( $data['id_level']=='2'){echo "selected"; } ?> value="2">Pelanggan</option>
        <option <?php if( $data['id_level']=='4'){echo "selected"; } ?> value="4">Pelayan</option>
        <option <?php if( $data['id_level']=='5'){echo "selected"; } ?> value="5">Owner</option>
    </select>
  </div>
  <button name="ubah" class="btn btn-success">Save</button>
</form>
<?php
if (isset($_POST['ubah'])) {
  $nama     = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hak      = $_POST['hak_akses'];

  $koneksi->query("UPDATE tb_user SET username='$username', password='$password', nama_user='$nama', id_level='$hak' WHERE id_user='$id'");
  echo "<script>alert('Data User Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=user';</script>";
}

 ?>
