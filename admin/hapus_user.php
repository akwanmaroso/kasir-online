<?php
include '../inc/koneksi.php';
$id = $_GET['id'];

$koneksi->query("DELETE FROM tb_user WHERE id_user='$id'");
echo "<script>alert('User Berhasil Terhapus');</script>";
echo "<script>location='index.php?halaman=user'</script>"
 ?>
