<?php
session_start();
include 'koneksi.php';

// Awal Query Detail Pesanan
if (isset($_SESSION['id_pelanggan'])) {
  $id = $_SESSION['id_pelanggan'];
  $tampil = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN pelanggan ON pelanggan.id_pelanggan = keranjang.id_pelanggan WHERE pelanggan.id_pelanggan = $id ");
  $row_count = mysqli_num_rows($tampil);
}
// Akhir Query Detail Pesanan

// Awal Query Nama Produk
$names = mysqli_query($koneksi, "SELECT * FROM produk");
$ambil = mysqli_fetch_array($names);
// Akhir Query Nama Produk

?>

<!DOCTYPE html>
<html>

<!-- Awal Header -->

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
  <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/styleindex.css">

  <!-- Link Bootstrap Icon -->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- Link Css Testimoni -->
  <link rel="stylesheet" href="assets/testimoni.css" type="text/css">

  <!-- Link Bootrtrap -->
  <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- range slider -->

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="assets/styleindex.css" rel="stylesheet" />

  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<!-- Akhir Header -->


<body style="font-family: 'Poppins', sans-serif;">
  <div class="hero_area">
    <header class="header_section">

      <!-- Awal Navbar Atas-->
      <div class="header_top" style="background-color: #0F3460;">
        <div class="container-fluid">
          <div class="top_nav_container">
            <div class="contact_nav">
              <marquee behavior="slide" direction="right">
                <!--scrolldelay="1000" -->
                <a href="https://wa.me/6282112594075/">
                  <i class="bi bi-whatsapp" style="color: #FF5B00;" aria-hidden="true"></i>
                  <span class="text-5" style2="font-size: 13px;">
                    WhatsApp : +6282112594075
                  </span>
                </a>
                <a href="mailto:bisakenapa135@gmail.com">
                  <i class="bi bi-envelope" style="color: #FF5B00;" aria-hidden="true"></i>
                  <span class="text-5" style="font-size: 13px;">
                    Email : bisakenapa@gmail.com
                  </span>
                </a>
              </marquee>
            </div>
            <form method="POST" enctype="multipart/form-data">
              <div class="d-flex">
                <div class="col-md-8">
                  <input type="search" name="search" class="form-control" placeholder="Search Here...">
                </div>
                <div class="col-md-3">
                  <button name="cari" class="btn rounded" type="submit" style="background-color: #FFB72B; margin-left:-5px;">
                    <i class="bi bi-search" aria-hidden="true" style="color: #FF5B00 "></i>
                  </button>
                </div>
              </div>


            </form>

            <?php if (isset($_SESSION['user'])) { ?>
              <div class="user_option_box">
                <a href="profile/profile.php" class="account-link">
                  <i class="bi bi-person-circle" style="color: #FF5B00;"></i>
                  <span style="font-size: 14px;">
                    profile
                  </span>
                </a>

                <a href="keranjang/keranjang.php" class="cart-link">
                  <i class="bi bi-cart-fill" style="color: #FF5B00;"></i>
                  <span style="font-size: 14px;">
                    Cart
                  </span>
                  <span class="btn btn-danger px-2 py-0" style="background-color:red ; font: size 15px;px;"><?php echo $row_count; ?></span>
                </a>

                <a data-bs-toggle="modal" data-bs-target="#logout" class="account-link">
                  <i class="bi bi-person-circle" style="color: #FF5B00;"></i>
                  <span style="font-size: 14px;">
                    Logout
                  </span>
                </a>
              </div>
          </div>
        <?php } else { ?>
          <div class="user_option_box">
            <a href="login/index.php" class="account-link">
              <i class="bi bi-person-circle" style="color: #FF5B00;"></i>
              <span style="font-size: 14px;">
                Login
              </span>
            </a>

          </div>
        </div>
      <?php } ?>

      </div>
  </div>
  <!-- Akhir Navbar Atas -->

  <!-- Awal Navbar Bawah -->
  <div class="header_bottom" style="background-color: #FF5B00;">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <img src="assets/logo.png" width="60px" class="ml-5">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="d-flex ms-4 me-1">
          <!-- <marquee direction="down" height="30px" scrolldelay="900">
            <?php
            $names = mysqli_query($koneksi, "SELECT * FROM produk ");
            foreach ($names as $name) { ?>

              <h6 class="font-weight-bold mb-2 me-1 text-white" style="font-size: 18px;">
                <?= $name['nama_produk']; ?>
              </h6>

            <?php } ?>
          </marquee>

          <div class="col-md-1 me-2 rounded-4">
            <div style="background-color: #0F3460; font-size: 15px;" id="hours" class="value py-2 fw-bold rounded-5 text-center text-white">00</div>
          </div>

          <div class="col-md-1 me-2 rounded-4">
            <div style="background-color: #0F3460; font-size: 15px;" id="minutes" class="value py-2 fw-bold rounded-5 text-center text-white">00</div>
          </div>

          <div class="col-md-1 me-2 rounded-4">
            <div style="background-color: #0F3460; font-size: 15px;" id="seconds" class="value py-2 fw-bold rounded-5 text-center text-white">00</div>
          </div> -->

          <!--Awal Script Countdown -->
          <!-- <script>
            let akhir = new Date(new Date().getFullYear() + 1, 0, 1);

            let $hours = document.getElementById('hours');
            let $minutes = document.getElementById('minutes');
            let $seconds = document.getElementById('seconds');

            setInterval(function() {
              var now = new Date();
              var timeleft = (akhir - now) / 1000;
              updateclock(timeleft);
            }, 1000);

            function updateclock(remainingTime) {
              let hours = Math.floor(remainingTime / 3600) % 24;
              remainingTime -= hours * 3600;

              let minutes = Math.floor(remainingTime / 60) % 60;
              remainingTime -= minutes * 60;

              let seconds = Math.floor(remainingTime % 60);


              $hours.innerHTML = Number(hours);
              $minutes.innerHTML = Number(minutes);
              $seconds.innerHTML = Number(seconds);
            }
          </script> -->
          <!-- Akhir Script Coundown -->
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav fw-bold">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about/about.php"> About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produk/produk.php">Products</a>
            </li>
            <?php if (isset($_SESSION['user'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="order/order.php">Orders</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!-- Akhir Navbar Bawah -->
  </header>



  <!-- Awal Tentang Kami -->
  <div id="carouselExampleControls" class="carousel slide shadow-lg mb-0" data-bs-ride="carousel">
    <div class="carousel-inner align-content-center align-items-center">
      <div style="background: url(assets/slider1.jpg); background-size:cover; height:600px;  box-shadow: inset 0 0 0 600px rgba(0, 0, 0, 0.6); " class="carousel-item active p-5 text-white align-items-center" data-interval="500">
        <center class="p-5">
          <div class="detail-box p-5 mt-5">
            <h1 class="text-white fw-bold mt-3">
              Selamat Datang Di Shoes Store
            </h1>
            <h5 class="text-white mb-4">
              Toko Shoes Store memberikan berbagai pilihan harga dan model yang bervariasi sehingga dapat memberikan kemudahan bagi konsumen untuk melakukan keputusan pembelian.
            </h5>
            <a href="about/index.php" class="px-4 py-2 mt-4 rounded-1  fw-bold text-white" style="background-color: #FF5B00; border:none;">
              Selengkapnya
            </a>
          </div>
        </center>
      </div>
      <div class="carousel-item  p-5 text-white" data-interval="500" style="background: url(assets/slider2.jpg); background-size:cover; height:600px;  box-shadow: inset 0 0 0 600px rgba(0, 0, 0, 0.6); ">
        <center class="p-5">
          <div class="detail-box p-5 mt-5">
            <h1 class="text-white fw-bold mt-3">
              Selamat Datang Di Shoes Store
            </h1>
            <h5 class="text-white mb-4">
              Toko Shoes Store memberikan berbagai pilihan harga dan model yang bervariasi sehingga dapat memberikan kemudahan bagi konsumen untuk melakukan keputusan pembelian.
            </h5>
            <a href="about/index.php" class="px-4 py-2 rounded-1 mt-4  fw-bold text-white" style="background-color: #FF5B00; border:none;">
              Selengkapnya
            </a>
          </div>
        </center>
      </div>
      <div class="carousel-item  p-5 text-white" data-interval="500" style="background: url(assets/slider3.jpg); background-size:cover; height:600px;  box-shadow: inset 0 0 0 600px rgba(0, 0, 0, 0.6); ">
        <center class="p-5">
          <div class="detail-box p-5 mt-5">
            <h1 class="text-white fw-bold mt-3">
              Selamat Datang Di Shoes Store
            </h1>
            <h5 class="text-white mb-4">
              Toko Shoes Store memberikan berbagai pilihan harga dan model yang bervariasi sehingga dapat memberikan kemudahan bagi konsumen untuk melakukan keputusan pembelian.
            </h5>
            <a href="about/index.php" class="px-4 py-2 mt-4 rounded-1 fw-bold text-white" style="background-color: #FF5B00; border:none;">
              Selengkapnya
            </a>
          </div>
        </center>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
  <!-- Akhir Tentang Kami -->


  <!-- Awal Tampilan Produk -->
  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2 style="color: #0F3460;">
          Our Products
        </h2>
      </div>
      <div class="row">

        <?php

        // Awal Query Search Dan Nampilin Produk
        if (isset($_POST['cari'])) {
          $cari = $_POST['search'];
          $produks = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%$cari%' ");
        } else {
          $produks = mysqli_query($koneksi, "SELECT * FROM produk LIMIT 8");
        }


        // Akhir Query Search Dan Nampilin Produk

        foreach ($produks as $produk) {
          $harga = $produk['harga_produk'];
          $diskon = $produk['diskon_produk'];
          $hargadiskon = $diskon*$harga/100;
          $total = $harga - $hargadiskon;

          ?>
          <div class="col-md-3 mt-4">
            <div class="card p-0">
              <div class="card-body">
                <div class="card-img-actions">

                  <img src="foto-produk/<?= $produk['foto_produk'] ?>" class="card-img img-fluid" width="100px">


                </div>
              </div>

              <div class="card-body bg-light text-center px-2">
                <div class="mb-2">
                  <h6 class="font-weight-bold mb-2">
                    <?= $produk['nama_produk']; ?>
                  </h6>


                </div>
                <?php 
                 if ($diskon == 0 ) { ?>
                  <h5 class="mb-2 font-weight-bold" style="color: #001D6E;">Rp. <?= number_format($produk['harga_produk'], 0, ".", ".") ?></h5>
               <?php  } else { ?>
                 <h5 class="mb-2 font-weight-bold" style="color: #001D6E;"><s>Rp. <?= number_format($produk['harga_produk'], 0, ".", ".") ?></s><br>Rp.<?= number_format($total,0, ".",".")?></h5>
             <?php  }  ?>

                



                <a href="produk/detailproduk.php?id_produk=<?= $produk['id_produk'] ?>"><button type="button" class="btn bg-cart"></i> Details Produk</button></a>
              </div>
            </div>
          </div>

        <?php } ?>
      </div>
    </div>

    <div class="mt-5 d-flex justify-content-center align-content-center">
      <a href="produk/produk.php" class="text-white px-5 py-3 rounded-2 shadow" style="background-color: #0F3460;">
        View All Produk
      </a>
    </div>
  </section>

  <!-- Akhir Slider -->

  <!-- Awal About -->

  <section class="about_section" style="background-color: #0F3460;">
    <div class="container-fluid d-flex justify-content-center ">

      <div class="col-8 ml-auto">
        <div class="detail-box pr-md-3">
          <div class="heading_container heading_center">
            <h2 class="">
              Tentang Kami
            </h2>
          </div>
          <p align="center">
            Shoes Store merupakan sebuah toko usaha yang bergerak pada penjualan
            sepatu wanita dan pria.Toko Shoes Store berada didaerah Bogor. toko
            Shoes Store dibuka atau mulai merintis sejak tahun 2022 kemarin toko ini menjual
            sepatu wamita pria dan berbagai macam merek sepatu dan lain-lainya dengan kualitas super.
          </p>
          <div class="d-flex justify-content-center align-content-center">
            <a href="about/about.php" class="">
              Selengkapnya
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- Akhir Tampilan Produk -->


  <!-- Awal keunggulan Kami -->
  <section class="why_us_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center mb-5">
        <h2 style="color: #0F3460;">
          Mengapa Memilih Kami ?
        </h2>
      </div>
      <div class="row">

        <div class="col-md-4 justify-content-center">
          <div class="card P-3 py-3 px-3 mb-2 justify-content-center align-items-center shadow">
            <img src="assets/pilihan.png" class="card-img-top w-25  justify-content-center" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Banyak Pilihan</h5>
              <p class="card-text text-center">Toko Shoes Store memiliki banyak varian sepatu </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 justify-content-center">
          <div class="card P-3 py-3 px-3 mb-2 justify-content-center align-items-center shadow">
            <img src="assets/harga.png" class="card-img-top w-25  justify-content-center" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Harga Terjangkau</h5>
              <p class="card-text text-center">Harga yang terjangkau dan ramah di kalangan manapun</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 justify-content-center">
          <div class="card P-3 py-3 px-3 mb-2 justify-content-center align-items-center shadow">
            <img src="assets/kualitas.png" class="card-img-top w-25  justify-content-center" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Berkualitas</h5>
              <p class="card-text text-center">Sepatu yang kami jual memiliki kualitas tinggi</p>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- Akhir Keunggulan Kami -->


  <!-- Awal Riview Video -->
  <section class="why_us_section layout_padding" style="background-color: #0F3460;">
    <div class="container">
      <div class="heading_container heading_center mb-5">
        <h2 class="text-white">
          Riview
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <center>
            <video class="me-4" src="assets/riview1.mp4" controls width="400"></video>
            <video class="me-4" src="assets/riview2.mp4" controls width="400"></video>
            <video class="me-4" src="assets/riview3.mp4" controls width="400"></video>
          </center>
        </div>

        <!-- <div class="col-md-12 mt-4">
          <center>
            <video class="me-4" src="assets/riview4.mp4" controls width="400"></video>
            <video class="me-4" src="assets/riview5.mp4" controls width="400"></video>
            <video class="me-4" src="assets/riview6.mp4" controls width="400"></video>
          </center>
        </div> -->
      </div>
    </div>
    </div>
  </section>

  <!-- Akhir Riview Video -->


  <!-- Awal Testimoni -->
  <section class=" my-5 p-3 py-5">
    <div class="container rounded-5">
      <div class="text-center mt-4">
        <h2 class="fw-bolder">Testimoni</h2>
        <p class="lead fw-normal text-muted mb-5">Apa Yang Dikatakan Pelanggan ?</p>
      </div>
      <div id="carouselExampleControlsTesti" class="carousel slide shadow-lg mb-0" data-bs-ride="carousel">
        <div class="carousel-inner rounded-4" style="background-color:#0F3460;">
          <div class="carousel-item active rounded p-5 text-white" data-interval="2000" style="background-color: #0F3460;">
            <center>
              <div class="imgbox "><img class="rounded-circle border p-2" width="140" height="130" src="assets/testi1.jpg"></div>
              <h4 class="mt-3"><b>Albert</b></h4>
              <p class="w-75 text-white">Sepatu nya bagus, gak nyesel beli disini</p>
            </center>
          </div>
          <div class="carousel-item rounded p-5 text-white" data-interval="2000" style="background-color: #0F3460;">
            <center>
              <div class="imgbox "><img class="rounded-circle border p-2" width="140" height="130" src="assets/testi2.jpg"></div>
              <h4 class="mt-3"><b>Rina</b></h4>
              <p class="w-75 text-white">Kalo mau beli sepatu wajib disini si</p>
            </center>
          </div>
          <div class="carousel-item rounded p-5 text-white" data-interval="2000" style="background-color: #0F3460;">
            <center>
              <div class="imgbox "><img class="rounded-circle border p-2" width="140" height="130" src="assets/testi3.jpg"></div>
              <h4 class="mt-3"><b>Aufa</b></h4>
              <p class="w-75 text-white">Sepatu nya nyaman di pake bahan nya juga bagus </p>
            </center>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsTesti" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsTesti" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>
  <!-- Akhir Testimoni -->


  <!-- Awal Footer -->
  <section class="info_section " style="background-color: #0F3460;">
    <div class="container">
      <div class="row px-5">
        <div class="col-md-4">
          <div class="info_contact">
            <h5>
              <a href="" class="navbar-brand">
                <span>
                  Kontak
                </span>
              </a>
            </h5>
            <p>
              <i class="bi bi-map-marker" aria-hidden="true"></i>
              Alamat
            </p>
            <p>
              <i class="bi bi-phone" aria-hidden="true"></i>
              082112594075
            </p>
            <p>
              <i class="bi bi-envelope" aria-hidden="true"></i>
              bisakenapa135@gmail.com
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info_info">
            <h5>
              Shoes.Store
            </h5>
            <p>
              Shoes Store merupakan sebuah toko usaha yang bergerak pada penjualan sepatu wanita dan pria.Toko Shoes Store berada didaerah Bogor.
            </p>
          </div>
        </div>

        <div class="col-md-3 ms-3">
          <div class="info_form ">
            <h5>
              Social Media
            </h5>
            <div class="social_box">
              <a href="https://www.facebook.com/profile.php?id=100088386672431">
                <i class="bi bi-facebook" aria-hidden="true"></i>
              </a>
              <a href="https://www.instagram.com/shoesstore4458/">
                <i class="bi bi-instagram" aria-hidden="true"></i>
              </a>
              <a href="https://www.youtube.com/channel/UCCrDLupHd52tQrbRQQEEUfA">
                <i class="bi bi-youtube" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer_section" style="background-color: #0F3460;">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By Adi & Oni RPL

      </p>
    </div>
  </footer>
  <!-- Akhir Footer -->

  <!-- Awal Modal Logout -->
  <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column" style="font-size: 76px;">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <strong class="fs-6">
            Apakah Kamu Yakin Ingin Logout
          </strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <a href="login/logout-user.php"><button type="submit" class="btn btn-danger">Yes</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Modal Logout -->



  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  
  <script src="assets/js/main.js"></script>


</body>

</html>