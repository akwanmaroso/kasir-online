<h1>Riwayat Transaksi</h1>
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
        $ambil = $koneksi->query("SELECT * FROM tb_transaksi INNER JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user");
        $total_pemasukan = 0;
        while($data = $ambil->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['nama_user']; ?></td>
            <td><?php echo date('d F Y' , strtotime($data['tanggal'])); ?></td>
            <td>Rp. <?php echo number_format($data['total_bayar']); ?></td>
        </tr>
        <?php
        $tp=$total_pemasukan+=$data['total_bayar'];
         } ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total Transaksi</th>
            <th>Rp. <?php echo number_format($tp);  ?></th>
        </tr>
    </tfoot>
</table>
<a href="../report/cetak_transaksi.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak PDF</a>