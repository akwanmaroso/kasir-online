<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = $koneksi->query("SELECT * FROM tb_user WHERE username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = $login->num_rows;

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = $login->fetch_assoc();

	// cek jika user login sebagai admin
	if($data['id_level']=="3"){

		// buat session login dan username
		$_SESSION['admin'] = $data;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../admin/index.php");

		// cek jika user login sebagai kasir
		}else if($data['id_level']=="1"){
		// buat session login dan username
		$_SESSION['kasir'] = $data;
		$_SESSION['level'] = "kasir";
		// alihkan ke halaman dashboard kasir
		header("location:../kasir/index.php");

		// cek jika user login sebagai pelanggan
		}else if($data['id_level']=="4"){
		// buat session login dan username
		$_SESSION['pelayan'] = $data;
		$_SESSION['level'] = "pelayan";
		// alihkan ke halaman dashboard pelanggan
		header("location:../pelayan/index.php");

		// cek jika user login sebagai owner
		}else if($data['id_level']=="5"){
		// buat session login dan username
		$_SESSION['owner'] = $data;
		$_SESSION['level'] = "owner";
		// alihkan ke halaman dashboard owner
		header("location:../owner/index.php");

	// cek jika user login sebagai pengurus
	}else{

		// alihkan ke halaman login kembali
		header("location:../login.php");
	}
}else{
	header("location:../login.php");
}

?>
