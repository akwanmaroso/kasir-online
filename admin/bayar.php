<?php error_reporting(0)?>
<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kue</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Subharga</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$totalbelanja=0;
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
			</tr>
			<?php $no++; 
			$totalbelanja+=$subharga;
		endforeach;
			?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">Total Belanja</th>
				<th>Rp. <?php echo number_format($totalbelanja); ?></th>
			</tr>
		</tfoot>
	</table>	
	<form method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Uang Pelanggan</label>
						<input type="number" class="form-control" name="uang_p" required>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Total Belanja</label>
						<input readonly class="form-control" value="Rp. <?php echo number_format($totalbelanja);?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Kembalian</label>
						<?php $uang_pel = $_POST['uang_p'];
						$kembalian = $uang_pel - $totalbelanja; ?>
						<input type="text" readonly value="Rp. <?php echo number_format($kembalian); ?>" class="form-control"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>No Meja</label>
						<input type="number" class="form-control" name="no_meja" required>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Keterangan</label>
						<textarea name="keterangan" class="form-control" rows="1" required></textarea>
					</div>
				</div>
			</div>
			<button class="btn btn-primary" name="bayar">Bayar</button>
		</form>
		<?php

		if (isset($_POST["bayar"])) 
		{
			$id_user = $_SESSION["admin"]["id_user"];
			$no_meja = $_POST['no_meja'];
			$keterangan = $_POST['keterangan'];
			$tanggal = date("d-m-Y");
		
			$koneksi->query("INSERT INTO tb_order(no_meja,tanggal,id_user,keterangan) VALUES ('$no_meja','$tanggal','$id_user','$keterangan')");

			$id_order_baru 	= $koneksi->insert_id;

			$koneksi->query("INSERT INTO tb_transaksi(id_user,id_order,tanggal,total_bayar) VALUES('$id_user','$id_order_baru','$tanggal','$totalbelanja')");

			foreach ($_SESSION['cart'] as $id_masakan => $jumlah) {
				$ambil = $koneksi->query("SELECT * FROM masakan WHERE id_masakan ='$id_masakan'");
				$getmasakan = $ambil->fetch_assoc();

				$nama = $getmasakan['nama_masakan'];
				$harga = $getmasakan['harga'];
				$subharga = $getmasakan['harga'] * $jumlah;

				$koneksi->query("INSERT INTO tb_detail_order(id_order,id_masakan,jumlah,nama_masakan,harga,sub_harga,keterangan) VALUES ('$id_order_baru','$id_masakan','$jumlah','$nama','$harga','$subharga','$keterangan')");
			}
				unset($_SESSION['cart']);


			echo "<div class='alert alert-info'>Checkout Sukses</div>";
	  		// echo "<meta http-equiv='refresh' content='1;url=nota.php?id=$id_pembelian_baru'>";

		}
		?>
</div>