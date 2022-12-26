<!DOCTYPE html>
<html lang="en">
<?php include '../layout/header.php'; ?>

<body>
    <?php include '../layout/navbar.php'; ?>
    <?php
    // Awal Query Nampilin Produk
    if (isset($_POST['cari'])) {
        $cari = $_POST['search'];
        $ambils = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%$cari%' ");
    } else {
        $ambils = mysqli_query($koneksi, "SELECT * FROM produk");
    }
    // Akhir Query Nampilin Produk
    ?>

    <div class="container mb-5" style="font-family: poppins;">
        <section class="product_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2 style="color: #0F3460;">
                        Our Products
                    </h2>
                </div>
                <div class="row">
                    <?php foreach ($ambils as $ambil) {
                        $harga = $ambil['harga_produk'];
                        $diskon = $ambil['diskon_produk'];
                        $hargadiskon = $diskon * $harga / 100;
                        $total = $harga - $hargadiskon;
                    ?>
                        <div class="col-md-3 mt-2">
                            <div class="card p-0">
                                <div class="card-body">
                                    <div class="card-img-actions">
                                        <img src="../foto-produk/<?= $ambil['foto_produk'] ?>" class="card-img img-fluid" width="100px">
                                    </div>
                                </div>

                                <div class="card-body bg-light text-center px-2">
                                    <div class="mb-2">
                                        <h6 class="font-weight-bold mb-2">
                                            <?= $ambil['nama_produk']; ?>
                                        </h6>
                                    </div>
                                    <?php
                                    if ($diskon == 0) { ?>
                                        <h4 class="mb-2 font-weight-bold">Rp. <?= number_format($ambil['harga_produk'], 0, ".", ".") ?></h4>
                                    <?php  } else { ?>
                                        <h4 class="mb-2 font-weight-bold"><s>Rp. <?= number_format($ambil['harga_produk'], 0, ".", ".") ?></s><br>&nbsp;&nbsp;Rp.<?= number_format($total, 0, ".", ".") ?></h4>
                                    <?php  }  ?>
                                    <a href="detailproduk.php?id_produk=<?= $ambil['id_produk'] ?>"><button type="button" class="btn bg-cart"></i> Details Produk</button></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>

    <?php include '../layout/footer.php'; ?>
</body>

</html>