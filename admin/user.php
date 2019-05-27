<div class="row">
<div class="col-md-8">
  <h1>List User</h1>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama User</th>
        <th>username</th>
        <th>password</th>
        <th>Hak Akses</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>

      <?php $no=1;
      $ambil = $koneksi->query("SELECT * FROM tb_level INNER JOIN tb_user ON tb_level.id_level = tb_user.id_level");
      while($data = $ambil->fetch_assoc()){ ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['nama_user']; ?></td>
        <td><?php echo $data['username']; ?></td>
        <td><?php echo $data['password']; ?></td>
        <td class="text-center"><?php echo $data['nama_level']; ?></td>
        <td class="text-center">
          <a href="index.php?halaman=edit_user&id=<?php echo $data['id_user']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
          <a href="hapus_user.php?id=<?php echo $data['id_user']; ?>" class="btn btn-danger"><i class="fa fa-trash fa-1x"></i></a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<div class="col-md-4">
  <h1>Tambah User</h1>
  <form method="post">
    <div class="form-group">
      <label>Nama User</label>
      <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
      <label>Hak Akses</label>
      <select class="form-control" name="hak_akses">
          <option>-- Pilih Hak Akses --</option>
          <option value="3">Admin</option>
          <option value="1">Kasir</option>
          <option value="4">Pelayan</option>
          <option value="2">Pelanggan</option>
      </select>
    </div>
    <button name="save" class="btn btn-success">Save</button>
  </form>
  <?php if (isset($_POST['save'])) {
    $nama     = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak      = $_POST['hak_akses'];
    $koneksi->query("INSERT INTO tb_user(username,password,nama_user,id_level)VALUES('$username','$password','$nama','$hak')");
    echo "<script>alert('User Berhasil Di Tambahkan');</script>";
    echo "<script>location='index.php?halaman=user'</script>";
  } ?>
</div>
</div>
