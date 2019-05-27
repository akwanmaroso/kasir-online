<?php
include '../inc/koneksi.php';
$id = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM masakan WHERE id_masakan='$id'");
$pecah = $ambil->fetch_assoc();
$foto_masakan = $pecah['foto_makanan'];
if (file_exists("../inc/img/$foto_masakan"))
{
    unlink("../inc/img/$foto_masakan");
}
$koneksi->query("DELETE FROM masakan WHERE id_masakan='$id'");
echo "<script>alert('Masakan Terhapus');</script>";
echo "<script>location='index.php'</script>"
 ?>
