<h1>Riwayat Transaksi</h1>
<form method="GET">
  <label>Pilih Tanggal</label>
  <input type="date" name="tanggal" id="tanggal" required>
  <?php 
   ?>
  <button type="submit" class="btn btn-primary">Filter</button>
</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Tanggal</th>
            <th>Total Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $totalpemasukan=0;
        if (isset($_GET['tanggal'])) {
          $tgl = $_GET['tanggal'];
          $format = date('d-m-Y', strtotime($tgl));
          $ambil = $koneksi->query("SELECT * FROM tb_transaksi INNER JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user WHERE tanggal='$format' ");
        }
        else {
          $ambil = $koneksi->query("SELECT * FROM tb_transaksi INNER JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user" );
        }
        while($data = $ambil->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['nama_user']; ?></td>
            <td><?php echo $data['tanggal']; ?></td>
            <td>Rp. <?php echo number_format($data['total_bayar']); ?></td>
        </tr>
        <?php
        $totalpemasukan+=$data['total_bayar'];
         } ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="3">Total Pemasukan</th>
        <th>Rp. <?php echo number_format($totalpemasukan) ?></th>
      </tr>
    </tfoot>
</table>
<a href="../report/cetak_transaksi.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak PDF</a>
