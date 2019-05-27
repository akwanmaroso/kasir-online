<?php
if (empty($_SESSION['cart'])) {
	echo "<script>alert('Keranjang Kosong, Silahkan Pesan Makanan')</script>";
	echo "<script>location='index.php'</script>";
	exit();
}
 ?>
<h2>Pesanan Makanan</h2>
	<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Masakan</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Subharga</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($_SESSION['cart'] as $id_masakan => $jumlah):
			 ?>
			<?php
			$ambil = $koneksi->query("SELECT * FROM masakan WHERE id_masakan = '$id_masakan'");
			$pecah = $ambil->fetch_assoc();
			$subharga = $pecah["harga"]*$jumlah;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $pecah['nama_masakan']; ?></td>
				<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
				<td><?php echo $jumlah; ?></td>
				<td>Rp. <?php echo number_format($subharga); ?></td>
				<td>
					<center>
					<a href="hapus_cart.php?id=<?php echo $pecah['id_masakan'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
					</center>
				</td>
			</tr>
			<?php $no++;
		endforeach;
			?>
		</tbody>
	</table>
	<a href="index.php?halaman=bayar&id=<?php echo $pecah['id_masakan']; ?>" class="btn btn-primary">Bayar</a>
