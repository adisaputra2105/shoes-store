<header class="header_section">
  <div class="header_top" style="background-color: #0F3460;">
    <div class="container-fluid">
      <div class="top_nav_container">
        <div class="contact_nav">
          <marquee behavior="slide" direction="right">
            <!--scrolldelay="1000" -->
            <a href="https://wa.me/6282112594075/">
              <i class="bi bi-whatsapp" style="color: #FF5B00;" aria-hidden="true"></i>
              <span class="text-5" style="font-size: 13px;">
                WhatsApp : +6282112594075
              </span>
            </a>
            <a href="">
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
            <a href="../profile/profile.php" class="account-link">
              <i class="bi bi-person-circle" style="color: #FF5B00;"></i>
              <span style="font-size: 14px;">
                profile
              </span>
            </a>

            <a href="../keranjang/keranjang.php" class="cart-link">
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
        <a href="../login/index.php" class="account-link">
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

  <div class="header_bottom" style="background-color: #FF5B00;">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <img src="../assets/logo.png" width="60px" class="ml-5">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>
<!-- 
        <div class="d-flex ms-4 me-1"> -->
          <!-- <marquee direction="down" height="30px" scrolldelay="900">
            <?php
            $names = mysqli_query($koneksi, "SELECT * FROM produk ");
            foreach ($names as $name) { ?>

              <h6 class="font-weight-bold mb-2 me-1 text-white" style="font-size: 18px;">
                <?= $name['nama_produk']; ?>
              </h6>

            <?php } ?>
          </marquee> -->

          <!-- <div class="col-md-1 me-2 rounded-4" >
                <div style="background-color: #0F3460; font-size: 15px;" id="hours" class="value py-2 fw-bold rounded-5 text-center text-white">00</div>
            </div>

            <div class="col-md-1 me-2 rounded-4" >
                <div style="background-color: #0F3460; font-size: 15px;" id="minutes" class="value py-2 fw-bold rounded-5 text-center text-white">00</div>
            </div>

            <div class="col-md-1 me-2 rounded-4" >
                <div style="background-color: #0F3460; font-size: 15px;" id="seconds" class="value py-2 fw-bold rounded-5 text-center text-white">00</div>
            </div>

            <script>
            let akhir = new Date(new Date().getFullYear()+ 1, 0, 1);

            let $hours = document.getElementById('hours');
            let $minutes = document.getElementById('minutes');
            let $seconds = document.getElementById('seconds');

            setInterval(function(){
                var now = new Date();
                var timeleft = (akhir - now) / 1000;
                updateclock(timeleft);
            }, 1000);

            function updateclock(remainingTime) {
                let hours = Math.floor(remainingTime / 3600 ) % 24;
                remainingTime -= hours * 3600;

                let minutes = Math.floor(remainingTime / 60 ) % 60;
                remainingTime -= minutes * 60;

                let seconds = Math.floor(remainingTime % 60 ) ;
                

                $hours.innerHTML = Number(hours);
                $minutes.innerHTML = Number(minutes);
                $seconds.innerHTML = Number(seconds);
            }
        </script>
        </div> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav fw-bold">
            <li class="nav-item ">
              <a class="nav-link" href="../index.php">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../about/about.php"> About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../produk/produk.php">Products</a>
            </li>
            <?php if (isset($_SESSION['user'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="../order/order.php">Orders</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>

<!-- Modal Logout -->
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
        <a href="../login/logout-user.php"><button type="submit" class="btn btn-danger">Yes</button></a>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal Logout -->