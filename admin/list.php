<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Masakan</th>
      <th>Harga</th>
      <th>Foto Makanan</th>
      <th>Status</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $ambil = $koneksi->query("SELECT * FROM masakan");
    while($data = $ambil->fetch_assoc()){
     ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $data['nama_masakan']; ?></td>
      <td>Rp. <?php echo number_format($data['harga']); ?></td>
      <td><img class="img-fluid" width="100px;" src="../inc/img/<?php echo $data['foto_makanan'] ?>"></td>
      <td><?php echo $data['status_masakan']; ?></td>
      <td class="text-center" >
        <a href="hapus.php?id=<?php echo $data['id_masakan']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" ></i> Hapus</a>
        <a href="index.php?halaman=edit_masakan&id=<?php echo $data['id_masakan']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<a href="index.php?halaman=tambahmasakan" class="btn btn-primary">Tambah Masakan</a>
