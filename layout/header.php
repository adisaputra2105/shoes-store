<?php
session_start();
include '../koneksi.php';
?>
<?php 
if (isset($_SESSION['id_pelanggan'])) {
  $id = $_SESSION['id_pelanggan'];
  $produks = mysqli_query($koneksi, "SELECT * FROM produk ");
  
  // $select_rows = mysqli_query($koneksi, "SELECT * FROM `keranjang`") or die('query failed');
  // $row_count = mysqli_num_rows($select_rows);
  $tampil = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN pelanggan ON pelanggan.id_pelanggan = keranjang.id_pelanggan WHERE pelanggan.id_pelanggan = $id") ;
  $row_count = mysqli_num_rows($tampil);
  // var_dump($tampil);
}


?>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SHOES STORE</title>
  <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/styleindex.css">

  <!-- Link Bootstrap Icon -->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- Link Css Testimoni -->
  <link rel="stylesheet" href="../assets/testimoni.css" type="text/css">

  <!-- Link Bootrtrap -->
  <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- range slider -->


  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../assets/styleindex.css" rel="stylesheet" />

  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>