<!DOCTYPE html>
<html lang="en">

<?php include '../header.php'; ?>
<?php $pesanans = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN pelanggan ON pelanggan.id_pelanggan = transaksi.id_pelanggan ORDER BY waktu DESC");

?>

<body id="page-top" style="font-family: 'Poppins';">

    <div id="wrapper">
        <?php include '../navbar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include '../profile.php'; ?>

                <div class="container-fluid">

                    <!-- Data Tabel Pesanan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <div class="col-md-7">
                                <h5 class="mt-2 font-weight-bold text-primary">Table Data Pesanan</h5>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table-dark">
                                        <tr class="text-center">
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col">Produk Pesanan</th>
                                            <th scope="col">Total Harga</th>
                                            <th scope="col">Bukti Pembayaran</th>
                                            <th scope="col">Waktu Pemesanan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pesanans as $pesanan) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $pesanan['barang_pesanan'] ?></td>
                                                <td class="text-center"><?= $pesanan['total_pembayaran'] ?></td>
                                                <td class="text-center">
                                                    <a button class="btntext-white" data-bs-toggle="modal" data-bs-target="#bgambar<?= $no ?>">
                                                        <img src="../../bukti/<?= $pesanan['bukti_pembayaran'] ?>" alt="" width="60" height="40">
                                                    </a>
                                                </td>
                                                <td class="text-center"><?= $pesanan['waktu'] ?></td>

                                                <td class="text-center">
                                                    <?php if ($pesanan['status'] == 'pending') { ?>
                                                        <span class="border fw-bold border-2 border-warning rounded text-warning px-2 fs-6">Pending</span>
                                                    <?php } ?>
                                                    <?php if ($pesanan['status'] == 'accept') { ?>
                                                        <span class="border fw-bold border-2 border-success rounded text-success px-2 fs-6">Accept</span>
                                                    <?php } ?>
                                                    <?php if ($pesanan['status'] == 'reject') { ?>
                                                        <span class="border fw-bold border-2 border-danger rounded text-danger px-2 fs-6">Reject</span>
                                                    <?php } ?>
                                                    <?php if ($pesanan['status'] == 'done') { ?>
                                                        <span class="border fw-bold border-2 border-success rounded text-success px-2 fs-6">Done</span>
                                                    <?php } elseif ($pesanan['status'] == 'diterima') { ?>
                                                        <span class="border fw-bold border-2 border-success rounded text-success px-2 fs-6">Diterima</span>
                                                    <?php } ?>



                                                </td>
                                                <td class="text-center">
                                                    <a button class="btn btn-success mx-1 text-white" data-bs-toggle="modal" data-bs-target="#bdetail<?= $no ?>"><i class="bi bi-pencil-square"></i></a>
                                                    <a button class="btn btn-danger mx-1 text-white" data-bs-toggle="modal" data-bs-target="#bhapus<?= $no ?>"><i class="bi bi-trash"></i></a>
                                                </td>

                                            </tr>


                                            <!-- Modal -->
                                            <div class="modal fade " id="bdetail<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="container">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="container col-md-12 mb-4">
                                                                <div class="p-1 row">
                                                                    <div class="mb-3 col-12">
                                                                        <label for="" style="font-size:15px;" class="mb-1">Barang Pesanan</label>
                                                                        <textarea type="text" readonly class="form-control" id="" aria-label="barangpesanan"><?= $pesanan['barang_pesanan'] ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3 col-12">
                                                                        <label for="" style="font-size:15px;" class="mb-1">Alamat Pengiriman</label>
                                                                        <textarea class="form-control" readonly id="" name=""><?= $pesanan['alm'] ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3 col-6">
                                                                        <label for="" style="font-size:15px;" class="mb-1">Total Pembayaran</label>
                                                                        <input type="text" class="form-control" id="" value="<?= $pesanan['total_pembayaran'] ?>" readonly>
                                                                    </div>
                                                                    <div class="mb-3 col-6">
                                                                        <label for="" style="font-size:15px;" class="mb-1">Nama Pernerima</label>
                                                                        <input type="input" class="form-control" readonly value="<?= $pesanan['nama_penerima'] ?>">
                                                                    </div>
                                                                    <div class="mb-3 col-6">
                                                                        <label for="" style="font-size:15px;" class="mb-1">Metode Pembayaran</label>
                                                                        <input type="text" readonly class="form-control" value="<?= $pesanan['metode_pembayaran'] ?>">
                                                                    </div>
                                                                    <div class="mb-3 col-6">
                                                                        <label for="" style="font-size:15px;" class="mb-1">No.Telepon</label>
                                                                        <input type="input" class="form-control" readonly value="<?= $pesanan['tlp_pelanggan'] ?>">
                                                                    </div>
                                                                    <div class="col-12 d-flex justify-content-between align-items-center w-100">
                                                                        <?php if ($pesanan['status'] == 'accept') { ?>
                                                                            <span style="margin-right: 30px; " class="border text-uppercase fw-bold border-2 border-success rounded text-success  text-center py-1 fs-6 w-100">Accept</span>
                                                                            <form class="" action="opsi-pesanan.php" method="POST">
                                                                                <input type="hidden" name="id_transaksi" value="<?= $pesanan['id_transaksi']; ?>">
                                                                                <input class="btn btn-sm btn-success w-100" type="submit" name="done" value="Done">
                                                                            </form>
                                                                        <?php } else if ($pesanan['status'] == 'reject') { ?>
                                                                            <span class="border text-uppercase fw-bold border-2 border-danger rounded text-danger text-center px-2 fs-6 w-100">Reject</span>
                                                                        <?php } else if ($pesanan['status'] == 'done') { ?>
                                                                            <span class="border text-uppercase fw-bold border-2 border-success rounded text-success text-center px-2 fs-6 w-100" style="margin-left: 10px;">Done</span>
                                                                        <?php } else if ($pesanan['status'] == 'pending') { ?>
                                                                            <form class="" action="opsi-pesanan.php" method="POST">
                                                                                <input type="hidden" name="id_transaksi" value="<?= $pesanan['id_transaksi']; ?>">

                                                                                <input style="margin-right: 10px;" class="btn btn-success w-100 me-3" type="submit" name="accept" value="Accept">

                                                                                <input class="btn btn-danger w-100 ms-3" style="margin-left: 10px;" type="submit" name="reject" value="Reject">

                                                                            </form>
                                                                        <?php } else if ($pesanan['status'] == 'diterima') { ?>
                                                                            <span class="border text-uppercase fw-bold border-2 border-success rounded text-success text-center px-2 fs-6 w-100" style="margin-left: 10px;">Diterima</span>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="bhapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <form action="opsi-pesanan.php" method="POST">
                                                            <input type="hidden" name="id_transaksi" value="<?= $pesanan['id_transaksi'] ?>">
                                                            <div class="modal-body text-center">
                                                                <strong class="fs-6">
                                                                    Are you sure want to delete this data?
                                                                </strong>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                                <button type="submit" class="btn btn-danger" name="bhapus">Yes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Hapus -->


                                            <!-- Modal Gambar -->
                                            <div class="modal fade" id="bgambar<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body d-flex justify-content-center">
                                                            <div class="">
                                                                <img src="../../bukti/<?= $pesanan['bukti_pembayaran'] ?>" alt="" width="450" height="450">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Gambar -->
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../footer.php'; ?>

</body>

</html>