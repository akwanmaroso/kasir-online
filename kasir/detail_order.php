<table class="table table-bordered table-hover">
  <thead>
    <tr class="text-center">
      <th>Nama Masakan</th>
      <th>Jumlah</th>
      <th>No Meja</th>
      <th>Tanggal</th>
      <th>Keterangan</th>
      <th>Status Order</th>
      <th>Detail</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $ambil = $koneksi->query("SELECT * FROM tb_order INNER JOIN tb_detail_order ON tb_order.id_order = tb_detail_order.id_order WHERE status_order='Diproses' ");
    // $ambil = $koneksi->query("SELECT * FROM tb_transaksi INNER JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user WHERE tanggal='$tgl' ");
    while($data = $ambil->fetch_assoc()){
    ?>
    <tr class="text-center">
      <td><?php echo $data['nama_masakan'] ?></td>
      <td><?php echo $data['jumlah'] ?></td>
      <td><?php echo $data['no_meja'] ?></td>
      <td><?php echo $data['tanggal'] ?></td>
      <td><?php echo $data['keterangan'] ?></td>
      <td><?php echo $data['status_order'] ?></td>
      <td>
        <?php if($data['status_order'] == "Diproses"): ?>
        <p>Belum Di hidangkan</p>
        <?php endif ?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>