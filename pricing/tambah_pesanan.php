<?php
require '../koneksi.php';
$users = mysqli_query($koneksi, "SELECT * FROM user");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Modern Business - Fluffypuffy</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
</head>
<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php include('../layout/navbar.php')?>
        <!-- Form Data -->
        <div class="container  mb-5">
            <h1 class="my-3  text-center">Jelaskan  Tentang Website Anda</h1>
            <div class="card">
                <div class="card-body rounded shadow-lg p-2" style="background: #f7f7f7fa;">
                  <div class="container p-3">
                    <form action="simpan.php" method="post" enctype="multipart/form-data">
                      <table class="w-100" id="example">
                        <tr>
                          <td>Nama</td>
                          <td>:</td>
                          <td><input type="text" class="form-control mb-2" id="nama_user" name="nama_user" placeholder="Nama User" required></td>
                      </tr>
                      <tr>
                          <td>No.Telpon</td>
                          <td>:</td>
                          <td><input type="text" class="form-control mb-2" id="no_tlp" name="no_tlp" placeholder="Nomer Telepon" required></td>
                      </tr>
                      <tr>
                          <td>Alamat</td>
                          <td>:</td>
                          <td><input type="text" class="form-control mb-2" id="alamat" name="alamat" placeholder="Alamat" required></td>
                      </tr>
                      <tr>
                          <td>Paket</td>
                          <td>:</td>
                          <td><select class="form-control mb-2" id="paket" name="paket" required>
                              <option hidden>Pilih Paket</option>
                              <option>SILVER (1,2 JT/Tahun)</option>
                              <option>GOLD (1,5 JT/Tahun)</option>
                              <option>DIAMOND (2 JT/Tahun)</option>  
                            </select></td>
                      </tr>
                      <tr>
                          <td>Pembayaran</td>
                          <td>:</td>
                          <td>
                            <select class="form-control mb-2" id="pembayaran" name="pembayaran" required>
                              <option hidden>Pilih Metode Pembayaran</option>
                              <option>No.rekening : 982301010 (BCA)</option>
                              <option>No.rekening : 982301010 (BRI)</option>
                              <option>No.rekening : 982301010 (BNAI)</option>
                              <option>No.rekening : 982301010 (MANDIRI)</option>
                              <option>No : 08712837377 (OVO)</option>
                              <option>No : 08712837377 (DANA)</option>
                            </select>
                          </td>
                      </tr>
                      <tr>
                          <td>Pesan</td>
                          <td>:</td>
                          <td><textarea class="form-control mb-2" name="pesan" required></textarea></td>
                      </tr>
                      <tr>
                          <td>Bukti Pembayaran</td>
                          <td>:</td>
                          <td><input class=" mb-2" type="file" id="formFileMultiple" multiple name="bukti" required></td>
                      </tr>
                      <tr>
                          <td>Materi Website</td>
                          <td>:</td>
                          <td><input class=" mb-2" type="file" id="formFileMultiple" multiple name="materi" required></td>
                      </tr>
                </table>
                <a href="simpan.php"><button type="submit" class="btn btn-primary w-100 mt-4" name="bayar">Bayar</button></a>
                <script>
                <!-- window.print() 
                </script>
                <script src="assets/js/bootstrap.bundle.min.js"></script>
            </form>
        </div>

    </div>

</div>
</div>

<!-- Footer-->
<?php include('../layout/footer.php')?>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<!-- Core theme JS-->
<!-- <script src="js/scripts.js"></script> -->
</body>
</html>
