

  <div class="row">
    <?php $ambil = $koneksi->query("SELECT * FROM masakan WHERE status_masakan='Tersedia' ");
  while($pecah = $ambil->fetch_assoc()){;
   ?>
   <div class="col-md-4">
     <img class="img-responsive" src="../inc/img/<?php echo $pecah['foto_makanan'] ?>" width="100%;">
     <br>
     <br>
   </div>
   <div class="col-md-8">
     <h1><?php echo $pecah['nama_masakan']; ?></h1>
     <p><b>Rp.<?php echo number_format($pecah['harga']); ?></b></p>
     <a href="pesan.php?id=<?php echo $pecah['id_masakan']; ?>" class="btn btn-primary">Pesan</a>

   </div>


<?php } ?>
</div>
