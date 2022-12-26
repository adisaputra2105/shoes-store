<!DOCTYPE html>
<html lang="en">
<?php include '../layout/header.php'; ?>


<body>
  <?php include '../layout/navbar.php'; ?>

  <?php
  // Jika Pelanggan Sudah Membeli Produk yang sama dan ukuran yang sama 
  $id = $_SESSION['id_pelanggan'];
  $id_keranjang = $_GET['id_keranjang'];
  $checkouts = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN produk ON (produk.id_produk = keranjang.id_produk)JOIN pelanggan ON (pelanggan.id_pelanggan = keranjang.id_pelanggan) WHERE keranjang.id_pelanggan = $id");
  date_default_timezone_set('Asia/jakarta');
  $today = date("Y-m-d H:i:s");
  $c = mysqli_fetch_array($checkouts);

  $no = 1;

  // Delete Keranjang
  if (isset($_POST['delete_btn'])) {

    $id = $_SESSION['id_pelanggan'];
    $update_quantity_query = mysqli_query($koneksi, "DELETE * FROM keranjang WHERE id_pelanggan = '$id'");
    echo "<script>window.location='keranjang.php'</script>";
  }
  // Akhir Detele Keranjang

  ?>


  <div class="container mt-5 mb-5" style="font-family: poppins;">
    <div class="row align-items-center">

      <!-- Awal List Belanjaan -->
      <div class="col-md-5">
        <div class="overflow-auto px-4 py-2 rounded" style="height: 500px;">
          <?php
          $totalberat = 0;
          foreach ($checkouts as $checkout) {
            $harga = $checkout['harga_produk'];
            $diskon = $checkout['diskon_produk'];
            $hargadiskon = $diskon * $harga / 100;
            $totalharga = $harga - $hargadiskon;
            $total = $totalharga * $checkout['jumlah_pesanan'];

          ?>
            <div class="row px-1 py-1 bg-white border rounded-1 shadow mb-3">
              <div class="col-md-5 mt-3 mb-3"><img class="img-fluid img-responsive rounded product-image" src="../foto-produk/<?= $checkout['foto_produk'] ?>" width="100%">
              </div>
              <div class="col-md-7 ml-3">
                <h6 class="font-weight-bold mt-3"><?= $checkout['nama_produk'] ?></h6>
                <h6 class="mr-1">Harga : <b>Rp.<?= number_format($totalharga, 0, ".", ".") ?></b></h6>
                <h6 class="mr-1">Ukuran : <b><?= $checkout['ukuran'] ?></b></h6>
                <h6 class="mr-1">Berat : <b><?= $checkout['berat_produk'] * $checkout['jumlah_pesanan'] ?> Kg</b></h6>
                <h6 class="mr-1">Jumlah Yang Dipesan : <b><?= $checkout['jumlah_pesanan'] ?></b></h6>
                <h6 class="mr-1">Total : <b>Rp.<?= number_format($total, 0, ".", ".") ?></b></h6>

              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <!-- Akhir List Belanjaan -->

      <!-- Awal Form Checkout -->
      <?php
      // Query Untuk Menampilkan Data Dari Ke Keranjang Ke Form Checkout
      $id_plg = $_SESSION['id_pelanggan'];
      $pecah = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN produk ON (produk.id_produk = keranjang.id_produk)JOIN pelanggan ON (pelanggan.id_pelanggan = keranjang.id_pelanggan) JOIN ekspedisi ON (ekspedisi.id_ekspedisi = keranjang.id_ekspedisi) WHERE keranjang.id_pelanggan = $id_plg");
      // $pecah = $ambil -> fetch_assoc();

      ?>
      <div class="col-md-6 ms-5">
        <h4 class="text-center mb-3">Silahkan Isi Form Dibawah Ini</h4>
        <form action="" method="POST" enctype="multipart/form-data">
          <table class="w-100" id="example">
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" class="form-control mb-2" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama User" value="<?= $_SESSION['nama_pelanggan'] ?>" disabled required></td>
            </tr>
            <tr>
              <td>No.Telpon</td>
              <td>:</td>
              <td><input type="text" class="form-control mb-2" id="tlp_pelanggan" name="tlp_pelanggan" placeholder="Nomer Telepon" value="<?= $_SESSION['tlp_pelanggan'] ?>" disabled required></td>
            </tr>
            <tr>
              <td>Total Belanjaan</td>
              <td>:</td>
              <td>
                <?php
                $jumlah = 0;
                $totalberat = 0;
                foreach ($checkouts as $checkout) {
                  $totalberat += $checkout['berat_produk'] * $checkout['jumlah_pesanan'];
                  $harga = $checkout['harga_produk'];
                  $diskon = $checkout['diskon_produk'];
                  $hargadiskon = $diskon * $harga / 100;
                  $totalharga = $harga - $hargadiskon;
                  $total = $totalharga * $checkout['jumlah_pesanan'];
                  $jumlah += $totalharga * $checkout['jumlah_pesanan'];

                ?>
                <?php } ?>
                <input type="text" class="form-control mb-2" id="total_pembayaran" name="jumlah_pembayaran" value="Rp. <?php echo number_format($jumlah, 0, ',', '.'); ?>" required readonly>
              </td>
            </tr>
            <tr>
              <td>Berat Total</td>
              <td>:</td>
              <td><input type="text" class="form-control mb-2" id="berat_produk" name="berat_produk" placeholder="Nomer Telepon" value="<?= $totalberat ?> Kg" readonly required></td>
            </tr>
            <tr>
              <td>Nama Penerima</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control mb-2" id="nama_penerima" name="nama_penerima" placeholder="Nama Penerima" required>
              </td>
            </tr>
            <tr>
              <td>Pembayaran</td>
              <td>:</td>
              <td>
                <select class="form-control mb-2" id="pembayaran" name="pembayaran" required>
                  <option hidden>Pilih Metode Pembayaran</option>
                  <option name="pembayaran">No.rekening : 982301010 (BCA)</option>
                  <option name="pembayaran">No.rekening : 982301010 (BRI)</option>
                  <option name="pembayaran">No.rekening : 982301010 (BNI)</option>
                  <option name="pembayaran">No.rekening : 982301010 (MANDIRI)</option>
                  <option name="pembayaran">No : 08712837377 (OVO)</option>
                  <option name="pembayaran">No : 08712837377 (DANA)</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Jasa Pengiriman</td>
              <td>:</td>
              <td>
                <select class="form-control mb-2" id="ekspedisi" name="ekspedisi" required>
                  <option value="" hidden>Pilih Jasa Pengiriman</option>
                  <?php
                  //  $totalberat = 0;

                  $ekspedisi = mysqli_query($koneksi, "SELECT * FROM ekspedisi");
                  foreach ($ekspedisi as $kirim) {
                    $totalongkir = $totalberat * $kirim['ongkir'] + $kirim['biaya_admin'];
                  ?>
                    <option value="<?= $kirim['ekspedisi'] ?>"><?= $kirim['ekspedisi'] ?> ( Rp. <?= number_format($totalongkir,  0, ".", ".") ?> )
                  </option>
                    
                  <?php  } ?>

                </select>
              </td>
            </tr>
            <tr hidden>
              <td>Waktu Pemesanan</td>
              <td>:</td>
              <td><input type="datetime-local" class="form-control mb-2" name="wkt" value="<?= $today ?>"></input></td>
            </tr>
            <tr>
              <td>Alamat Lengkap</td>
              <td>:</td>
              <td><textarea type="text" class="form-control mb-2" name="alm" required></textarea></td>
            </tr>
            <tr>
              <td>Bukti Pembayaran</td>
              <td>:</td>
              <td><input class="form-control mb-2" type="file" id="formFileMultiple" multiple name="bukti" required></td>
            </tr>
          </table>
          <input type="submit" value="Bayar" class="btn btn-primary w-100 mt-4" name="bayar">
        </form>


        <?php
        // Post Form Checkout
        if (isset($_POST['bayar'])) {
          // $id_pelanggan = $_SESSION['id_pelanggan'];
          $total_pembayaran = $_POST['jumlah_pembayaran'];
          $pembayaran =  $_POST['pembayaran'];
          $nama_penerima = $_POST['nama_penerima'];
          $wkt = $_POST['wkt'];
          $alm = $_POST['alm'];
          $bukti = $_FILES['bukti']['name'];
          $source = $_FILES['bukti']['tmp_name'];
          $folder1 = '../bukti/';

          $upload = move_uploaded_file($source, '../bukti/' . $bukti);

          $id = $_SESSION['id_pelanggan'];
          $id_keranjang = $_GET['id_keranjang'];
          $checkouts = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN produk ON (produk.id_produk = keranjang.id_produk)JOIN pelanggan ON (pelanggan.id_pelanggan = keranjang.id_pelanggan) WHERE keranjang.id_pelanggan = $id");

          // Menyatukan Kolom Pesanan Menjadi 1
          if (mysqli_num_rows($checkouts) > 0) {
            while ($product_item = mysqli_fetch_assoc($checkouts)) {
              $nama_produk[] = $product_item['nama_produk']  . ' ( Jumlah Pesanan : ' . $product_item['jumlah_pesanan'] . ') (Ukuran : ' . $product_item['ukuran'] . ') ';
            };
          };

          $total_produk = implode(", ", $nama_produk);

          // Masukan Form Ke Tabel Transaksi
          $detail_query = mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi,id_pelanggan, barang_pesanan,metode_pembayaran,total_pembayaran, bukti_pembayaran, nama_penerima, alm, waktu, status) VALUES (NULL, '$id_plg','$total_produk','$pembayaran','$total_pembayaran','$bukti', '$nama_penerima','$alm' ,'$wkt','pending')");
          if ($detail_query) {
            echo "<script>alert('Pesanan Kamu Akan Di Proses Admin');</script>";
            echo "<script>window.location='../index.php'</script>";
          } else {
            echo "produk gagal dihapus";
          }
          if (isset($_POST['bayar'])) {
            mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_pelanggan = '$id'");
            // header('location:lihat-produk.php');
          }
        }


        ?>
      </div>
    </div>
  </div>
  <?php include '../layout/footer.php'; ?>
</body>

</html>