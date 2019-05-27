      <h1>Tambah Makanan</h1>
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Masakan</label>
            <input type="text" name="nama" class="form-control">
          </div>
          <div class="form-group">
            <label>Harga Masakan</label>
            <input type="number" name="harga" class="form-control">
          </div>
          <div class="form-group">
            <label>Foto Masakan</label>
            <input type="file" name="foto" class="form-control">
          </div>
          <div class="form-group">
            <label>Status Masanan</label>
            <select class="form-control" name="status">
              <option>-- Pilih Status Masakan --</option>
              <option value="Tersedia">Tersedia</option>
              <option value="Kosong">Kosong</option>
            </select>
          </div>
          <button class="btn btn-primary" name="save">Tambah</button>
        </form>
        <?php

        if (isset($_POST['save'])) {
          $nama             = $_POST['nama'];
          $harga            = $_POST['harga'];
          $status           = $_POST['status'];
          $nama_f           = $_FILES['foto']['name'];
          $lokasi           = $_FILES['foto']['tmp_name'];
          $acak             = rand(1,999999);
          $nama_acak        = $acak.$nama_f;
          $vdir_upload      = "../inc/img/";
          $vfile_upload     = $vdir_upload . $nama_acak;
          move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload);
          $koneksi->query("INSERT INTO masakan(nama_masakan,harga,foto_makanan,status_masakan)VALUES ('$nama','$harga','$nama_acak','$status')");
          echo "<script>alert('Masakan Berhasil Di Tambahkan');</script>";
          echo "<script>location='index.php?halaman=list'</script>";
        }
         ?>


    </main>
