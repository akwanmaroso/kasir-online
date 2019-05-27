<?php 
include '../inc/koneksi.php';
$id = $_GET['id'];

$koneksi->query("UPDATE tb_order SET status_order='Selesai' WHERE id_order='$id' ");
echo "<script>alert('Masakan Berhasil Di Hidangkan');</script>";
echo "<script>location='index.php'</script>";
 ?>