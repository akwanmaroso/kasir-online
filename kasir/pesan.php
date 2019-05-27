<?php
session_start();
//mendapatkan id produk dari url
$id_masakan = $_GET['id'];

//jika sudah ada produk di keranjang jumlah produk +1
if (isset($_SESSION['cart'][$id_masakan]))
{
	$_SESSION['cart'][$id_masakan]+=1;
}

// jika blum ada barang di beli 1
else
{
	$_SESSION['cart'][$id_masakan] = 1;
}

//larikan ke halaman keranjang
 echo "<script>alert('produk telah ditambahkan ke keranjang belanja');</script>";
 echo "<script>location='index.php?halaman=cart';</script>";
?>
