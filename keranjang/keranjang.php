<!DOCTYPE html>
<html lang="en">
<?php include '../layout/header.php'; ?>

<body>

    <?php include '../layout/navbar.php'; ?>
    <?php

    // Jika Pelanggan Sudah Membeli Produk yang sama dan ukuran yang sama 
    $id = $_SESSION['id_pelanggan'];
    $keranjangs = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN produk ON (produk.id_produk = keranjang.id_produk)JOIN pelanggan ON (pelanggan.id_pelanggan = keranjang.id_pelanggan) WHERE keranjang.id_pelanggan = $id");

    $no = 1;

    // Delete Keranjang
    if (isset($_POST['delete_btn'])) {

        $update_id = $_POST['delete_quantity_id'];
        $update_quantity_query = mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_keranjang = '$update_id'");
        echo "<script>window.location='keranjang.php'</script>";
    }
    // Akhir Detele Keranjang

    // Update Kuantitas
    if (isset($_POST['update_update_btn'])) {
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = mysqli_query($koneksi, "UPDATE Keranjang SET jumlah_pesanan = '$update_value' WHERE id_keranjang = '$update_id'");
        echo "<script>window.location='keranjang.php'</script>";
    }
    // Akhir Update Kuantitas

    if ($keranjangs->num_rows > 0) {

    ?>

        <div class="container-fluid">
            <!-- Tabel Keranjang -->
            <div class="card shadow mt-5 mb-5">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Ukuran Sepatu</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Update Quantity</th>
                                    <th scope="col">Sub Harga</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $jumlah = 0;
                                foreach ($keranjangs as $keranjang) {
                                    $harga = $keranjang['harga_produk'];
                                    $diskon = $keranjang['diskon_produk'];
                                    $hargadiskon = $diskon*$harga/100;
                                    $totalharga = $harga - $hargadiskon;

                                    $total = $totalharga * $keranjang['jumlah_pesanan'];

                                    $jumlah += $totalharga * $keranjang['jumlah_pesanan'];
                                ?>
                                    <tr class="text-center">
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $keranjang['nama_produk'] ?></td>
                                        <td>Rp. <?= number_format($totalharga, 0, ".", ".") ?></td>
                                        <td><?= $keranjang['ukuran'] ?></td>
                                        <td><?= $keranjang['jumlah_pesanan'] ?></td>
                                        <td>
                                            <form action="" method="POST">
                                                <input type="hidden" name="update_quantity_id" value="<?php echo $keranjang['id_keranjang']; ?>">
                                                <input type="number" name="update_quantity" min="1" class="col-2">
                                                <input type="submit" href="keranjang.php" class="btn btn-success px-1 py-1" value="Update" name="update_update_btn" style="font-size: 15px;">
                                            </form>
                                        </td>
                                        <td>Rp. <?= number_format($total, 0, ".", ".") ?></td>
                                        <td>
                                            <form action="" method="POST">
                                                <input type="hidden" name="delete_quantity_id" value="<?php echo $keranjang['id_keranjang']; ?>">
                                                <input type="submit" href="keranjang.php" class="btn btn-danger px-1 py-1" value="Delete" name="delete_btn" style="font-size: 15px;">
                                            </form>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th colspan="2"><a href="../produk/produk.php" class="btn btn-warning text-white">Lanjutkan Belanja</a></th>
                                    <th colspan="3" class="text-center"><span>Total Belanja:</span></th>
                                    <th colspan="">Rp. <span name="total_belanja" id="total_belanja"><?php echo number_format($jumlah, 0, ',', '.'); ?></span></th>
                                    <th colspan="2"><a href="../checkout/checkout.php?id_keranjang=<?= $keranjang['id_keranjang'] ?>" class="btn btn-primary">Lanjutkan Checkout</a></th>
                                </tr>

                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../layout/footer.php'; ?>
        <?php }else { ?>
            <script>
                alert('Keranjang Kosong');
                document.location.href="../index.php";
            </script>
            <?php } ?>
    </body>
    
    </html>