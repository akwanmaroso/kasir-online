<?php
session_start();
$id_masakan=$_GET["id"];
unset($_SESSION["cart"][$id_masakan]);

echo "<script>alert('Produk berhasil dihapus dari keranjang');</script>";
echo "<script>location='index.php?halaman=cart';</script>";
 ?>
