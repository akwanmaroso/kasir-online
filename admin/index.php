<?php include '../inc/koneksi.php';
session_start();
if (empty($_SESSION['level']== "admin")) {
  echo "<script>alert('Anda Harus Login');</script>";
  header('location:../login.php');
  exit();
} ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="icon" type="image/png" href="inc/img/favicon.ico">
    <title>Dashboard -- Admin</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../inc/css/dashboard.css" rel="stylesheet">
    <link href="../inc/css/font-awesome.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <a href="index.php?halaman=cart" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="../logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span data-feather="home"></span>
              Pesan Makanan <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=list">
              <span data-feather="file"></span>
              List Makanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=transaksi">
              <span data-feather="users"></span>
              Riwayat Transaksi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=user">
              <span data-feather="users"></span>
              User
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <section class="konten">
      <br>
      <?php
      if (isset($_GET['halaman']))
      {
        if ($_GET['halaman']=="tambahmasakan") {
          include 'tambah.php';
        }
        elseif ($_GET['halaman']=="list") {
          include 'list.php';
        }
        elseif ($_GET['halaman']=="cart") {
          include 'cart.php';
        }
        elseif ($_GET['halaman']=="user") {
          include 'user.php';
        }
        elseif ($_GET['halaman']=="edit_user") {
          include 'edit_user.php';
        }
        elseif ($_GET['halaman']=="edit_masakan") {
          include 'edit_masakan.php';
        }
        elseif ($_GET['halaman']=="bayar") {
          include 'bayar.php';
        }
        elseif ($_GET['halaman']=="transaksi") {
          include 'transaksi.php';
        }

      }
      else {
        include 'home.php';
      }
       ?>
    </section>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="../inc/js/dashboard.js"></script></body>
</html>
