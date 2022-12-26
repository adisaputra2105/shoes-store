<!DOCTYPE html>
<html lang="en">
<?php include '../layout/header.php'; ?>


<body>
    <?php include '../layout/navbar.php'; ?>
    <?php
    // Awal Query Nampilin Detail Produk Sesuai Id
    $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[id_produk]'");
    $produk = mysqli_fetch_array($ambil);

    $harga = $produk['harga_produk'];
    $diskon = $produk['diskon_produk'];
    $hargadiskon = $diskon * $harga / 100;
    $total = $harga - $hargadiskon;
    // Akhir Query Nampilin Detail Produk Sesuai Id
    ?>

    <!-- Awal Detail Produk -->
    <div class="container mt-5 mb-5" style="font-family: poppins;">
        <div class="d-flex justify-content-center row">
            <div class="col-md-12">
                <div class="row px-2 py-2 bg-white border rounded-1 shadow">
                    <div class="col-md-4 mt-3 mb-3"><img class="img-fluid img-responsive rounded product-image" src="../foto-produk/<?= $produk['foto_produk'] ?>" width="100%">
                    </div>
                    <div class="col-md-7 ml-3">
                        <h4 class="font-weight-bold mt-3"><?= $produk['nama_produk'] ?></h4>
                        <?php
                        if ($diskon == 0) { ?>
                            <h4 class="mb-2 font-weight-bold">Rp. <?= number_format($produk['harga_produk'], 0, ".", ".") ?></h4>
                        <?php  } else { ?>
                            <h4 class="mb-2 font-weight-bold"><s>Rp. <?= number_format($produk['harga_produk'], 0, ".", ".") ?></s>&nbsp;&nbsp;Rp.<?= number_format($total, 0, ".", ".") ?></h4>
                        <?php  }  ?>
                        <span class="strike-text"></span>

                        <p class="text-justify para mb-3"><?= $produk['deskripsi_produk'] ?><br>
                        </p>
                        <form action="" method="POST">
                            <div class="d-flex">
                                <div class="">
                                    <div class=""> Ukuran :
                                        <?php
                                        if (isset($_SESSION['id_pelanggan'])) { ?>
                                            <input type="hidden" value="<?= $_SESSION['id_pelanggan']; ?>" name="id_pelanggan">
                                        <?php } ?>
                                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">

                                        <input type="radio" class="btn-check px-1 py-4 me-2" name="ukuran" id="option1" autocomplete="off" value="39">
                                        <label class="btn btn-outline-primary" for="option1" style="font-size: 12px;">39</label>

                                        <input type="radio" class="btn-check px-1 py-4" name="ukuran" id="option2" autocomplete="off" value="40">
                                        <label class="btn btn-outline-primary" for="option2" style="font-size: 12px;">40</label>

                                        <input type="radio" class="btn-check px-1 py-4" name="ukuran" id="option3" autocomplete="off" value="41">
                                        <label class="btn btn-outline-primary" for="option3" style="font-size: 12px;">41</label>

                                        <input type="radio" class="btn-check px-1 py-4" name="ukuran" id="option4" autocomplete="off" value="42">
                                        <label class="btn btn-outline-primary" for="option4" style="font-size: 12px;">42</label>

                                    </div>
                                </div>
                            </div>


                            <div class="d-flex mt-3">
                                <?php if (isset($_SESSION['id_pelanggan'])) { ?>
                                    <div class="md-6 ms-2">
                                        <button name="btnkirim" class="btn btn-primary btn-sm px-3 py-2 ml-3" type="submit"><i class="bi bi-cart-plus-fill"></i> Tambah Ke Keranjang</button>
                                    </div>
                                <?php } else { ?>
                                    <div class="md-6 ms-2">
                                        <a href="../login/index.php" class="btn btn-primary btn-sm px-3 py-2 ml-3" type=""><i class="bi bi-cart-plus-fill"></i> Tambah Ke Keranjang</a>

                                    </div>
                                <?php  } ?>

                                <?php
                                // Awal Query Ngirim Data Ke Keranjang
                                if (isset($_POST['btnkirim'])) {
                                    $id_user = $_SESSION['id_pelanggan'];
                                    $id_produk = $_POST['id_produk'];
                                    $ukuran = $_POST['ukuran'];
                                    $jumlah_pesanan = 1;

                                    $select_cart = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN pelanggan ON pelanggan.id_pelanggan = keranjang.id_pelanggan  WHERE keranjang.ukuran = '$ukuran' AND keranjang.id_produk = '$id_produk' AND pelanggan.id_pelanggan = '$id_user'");
                                    if (mysqli_num_rows($select_cart) > 0) {
                                        $_SESSION['eksekusi'] = "Produk Sudah Ditambahkan";
                                        // JIKA BARANG BELUM DITAMBAHKAN MAKA TAMPILKAN INI
                                        echo "<script>
                                            alert('Anda Telah Memesan Produk dan Ukuran Yang Sama, Silahkan Lihat Keranjang Anda');
                                            document.location.href = '../keranjang/keranjang.php';
                                            </script>";
                                    } else {
                                        $insert_product = mysqli_query($koneksi, "INSERT INTO keranjang VALUES('','$id_user','$id_produk','$ukuran','$jumlah_pesanan')");

                                        if ($insert_product) {
                                            echo "<script>
                                            alert('Produk Berhasil Ditambahkan Ke Keranjang');
                                            document.location.href = '../keranjang/keranjang.php';
                                            </script>";
                                        } else {
                                        }
                                    }
                                }
                                // Akhir Query Ngirim Data Ke Keranjang
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Detail Produk -->

    <?php include '../layout/footer.php'; ?>

</body>

</html>