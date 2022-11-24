<!DOCTYPE html>
<html lang="en">
<?php include '../layout/header.php'; ?>


<body>
    <?php include '../layout/navbar.php'; ?>
    <?php
    $id_plg = $_SESSION['id_pelanggan'];
    $orders = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN pelanggan ON pelanggan.id_pelanggan = transaksi.id_pelanggan  WHERE transaksi.id_pelanggan  = '$id_plg'");
    ?>


    <style>
        .card-button {
            display: flex;
            justify-content: center;
            padding: 20px 0;
            width: 100%;
            color: #fff;
            border-radius: 0 0 8px 8px;
        }
    </style>


    <div class=" min-vh-100 container mt-5 mb-5 d-flex flex-column">
        <div class="row gx-5 align-content-center">
            <!-- Pricing card free-->
            <?php
            foreach ($orders as $order) { ?>
                <div class="col-md-3 mt-2 mb-2 ">
                    <div class="card p-0  align-items-center " style="width: 20rem; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22); ">
                        <div class="card-image" style="border-bottom:solid 2px;">
                            <img src="../assets/logo.png" class="my-4 mx-4 " width="150" />
                        </div>
                        <div class="card-body">
                            <h6 class=" fw-bold text-center text-dark mt-2 ms-2">Total Pembayaran : </h6>
                            <h6 class=" text-center fw-bold text-dark "><?= $order['total_pembayaran'] ?></h6>
                            <h6 class=" text-center fw-bold text-dark ">Tanggal Pemesanan :</h6>
                            <h6 class=" text-center fw-bold text-dark "><?= $order['waktu'] ?></h6>

                        </div>

                        <div class="card-button bg-primary ">
                            <a button data-bs-toggle="modal" data-bs-target="#bdetail<?= $order['id_transaksi'] ?>">
                                <div class="d-flex justify-content-between align-items-center ">
                                    <span class="text-white bold
                                ">Detail Pesanan</span>
                                </div>
                            </a>
                        </div>



                    </div>
                </div>





                <!-- Modal -->
                <div class="modal fade " id="bdetail<?= $order['id_transaksi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <textarea type="text" readonly class="form-control" id="" aria-label="barangpesanan"><?= $order['barang_pesanan'] ?></textarea>
                                        </div>
                                        <div class="mb-3 col-12">
                                            <label for="" style="font-size:15px;" class="mb-1">Alamat Pengiriman</label>
                                            <textarea class="form-control" readonly id="" name=""><?= $order['alm'] ?></textarea>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="" style="font-size:15px;" class="mb-1">Total Pembayaran</label>
                                            <input type="text" class="form-control" id="" value="<?= $order['total_pembayaran'] ?>" readonly>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="" style="font-size:15px;" class="mb-1">Nama Pernerima</label>
                                            <input type="input" class="form-control" readonly value="<?= $order['nama_penerima'] ?>">
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="" style="font-size:15px;" class="mb-1">Metode Pembayaran</label>
                                            <input type="text" readonly class="form-control" value="<?= $order['metode_pembayaran'] ?>">
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="" style="font-size:15px;" class="mb-1">No.Telepon</label>
                                            <input type="input" class="form-control" readonly value="<?= $order['tlp_pelanggan'] ?>">
                                        </div>
                                        <label for="" style="font-size:15px;" class="mt-3 text-center">Status Pengiriman :</label>
                                        <div class="col-12 d-flex justify-content-between align-items-center w-100">

                                            <?php if ($order['status'] == 'accept') { ?>
                                                <span class="border text-uppercase fw-bold border-2 border-success rounded text-success  text-center py-1 fs-6 w-100">Accept</span>
                                            <?php } else if ($order['status'] == 'reject') { ?>
                                                <span class="border text-uppercase fw-bold border-2 border-danger rounded text-danger text-center px-2 fs-6 w-100">Reject</span>
                                            <?php } else if ($order['status'] == 'done') { ?>
                                                <span class="border text-uppercase fw-bold border-2 border-success rounded text-success text-center px-2 fs-6 w-100">Done</span>
                                            <?php } else if ($order['status'] == 'pending') { ?>
                                                <span class="border text-uppercase fw-bold border-2 border-warning rounded text-warning text-center px-2 fs-6 w-100">Pending</span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- <div class="d-flex justify-content-center align-items-center">
    <h1>Maaf anda belum order product kami, <a href="../products/index.php">SILAHKAN PESAN</a></h1>
</div> -->
        </div>

    </div>

    </div>

    <?php include '../layout/footer.php'; ?>
</body>

</html>