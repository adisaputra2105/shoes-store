<!DOCTYPE html>
<html lang="en">

<?php include '../header.php'; ?>
<?php $produks = mysqli_query($koneksi, "SELECT * FROM produk"); ?>

<body id="page-top" style="font-family: 'Poppins';">

    <div id="wrapper">
        <?php include '../navbar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include '../profile.php'; ?>

                <div class="container-fluid">

                    <!-- Data Tabel Produk -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <div class="col-md-7">
                                <h5 class="mt-2 font-weight-bold text-primary">Table Data Produk</h5>
                            </div>
                            <div class="me-auto" style="margin-left: 100px;"><a button class="btn btn-primary text-white " data-bs-toggle="modal" data-bs-target="#btambah"><i class="bi bi-plus-circle me-2"></i> Tambah Data Produk</a></div>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table-dark">
                                        <tr class="text-center">
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Berat Produk</th>
                                            <th scope="col">Harga Produk</th>
                                            <th scope="col">Foto Produk</th>
                                            <th scope="col">aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($produks as $produk) { ?>
                                            <tr class="text-center">
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $produk['nama_produk'] ?></td>
                                                <td><?= $produk['berat_produk'] ?></td>
                                                <td>Rp. <?= number_format($produk['harga_produk'], 0, ".", ".") ?></td>
                                                <td>
                                                    <a button class="btntext-white" data-bs-toggle="modal" data-bs-target="#bgambar<?= $no ?>">
                                                        <img src="../../foto-produk/<?= $produk['foto_produk'] ?>" alt="" width="60" height="40">
                                                    </a>
                                                </td>
                        

                                                <td class="text-center">
                                                    <a button class="btn btn-success mx-1 mb-2 mb-lg-0 text-white" data-bs-toggle="modal" data-bs-target="#bedit<?= $no ?>"><i class="bi bi-pencil-square"></i></a>
                                                    <a button class="btn btn-danger mx-1 text-white" data-bs-toggle="modal" data-bs-target="#bhapus<?= $no ?>"><i class="bi bi-trash"></i></a>
                                                </td>
                                            </tr>
                                            <!-- Akhir Tabel Data Produk -->


                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="bedit<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Your Data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="container col mb-4">
                                                            <div class="p-1 row">
                                                                <form action="opsi-produk.php" method="POST" enctype="multipart/form-data">
                                                                    <div class=" col-6">
                                                                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
                                                                        <label for="nama_produk" style="font-size:15px;" class="mb-1">Nama Produk</label>
                                                                        <textarea name="nama_produk" id="nama_produk" class="form-control" value="<?php echo $produk['nama_produk']; ?>"><?php echo $produk['nama_produk']; ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3 col-6">
                                                                        <label for="deskripsi_produk" style="font-size:15px;" value="<?php echo $produk . ['deskripsi_produk']; ?>" class="mb-1">Deskripsi Produk</label>
                                                                        <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" value="<?php echo $produk['deskripsi_produk']; ?>"><?php echo $produk['deskripsi_produk']; ?></textarea>
                                                                    </div>
                                                                    <div class=" col-6">
                                                                        <label for="berat_produk" style="font-size:15px;" class="mb-1">Berat Produk (Kg)</label>
                                                                        <input name="berat_produk" id="berat_produk" class="form-control" value="<?php echo $produk['berat_produk']; ?>">
                                                                    </div>
                                                                    <div class="mb-3 col-6">
                                                                        <label for="harga_produk" style="font-size:15px;" class="mb-1">Harga Produk</label>
                                                                        <input type="input" class="form-control" id="harga_produk" name="harga_produk" value="<?= $produk['harga_produk'] ?>" placeholder="Harga Produk" aria-label="Harga Produk">
                                                                    </div>
                                                                    <div class="mb-3 col-6">
                                                                        <label for="diskon_produk" style="font-size:15px;" class="mb-1">Diskon Produk</label>
                                                                        <input type="input" class="form-control" id="diskon_produk" name="diskon_produk" value="<?= $produk['diskon_produk'] ?>" placeholder="Harga Produk" aria-label="Diskon Produk">
                                                                    </div>
                                                                    
                                                                    <div class="mb-3 col-6">
                                                                        <label for="foto_produk" style="font-size:15px;" class="mb-1">Foto Produk</label>
                                                                        <input type="file" class="form-control" id="foto_produk" name="foto_produk" value="<?php echo $produk['foto_produk']; ?> " placeholder="Foto Produk" aria-label="Foto Produk">
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success text-white" name="bedit">Save changes</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Edit -->



                                            <!-- Modal Tambah Data -->
                                            <div class="modal fade" id="btambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <div class="container px-5 py-5">
                                                            <div class="row mb-3">
                                                                <form action="opsi-produk.php" method="POST" enctype="multipart/form-data">
                                                                    <div class="col">
                                                                        <label for="nama_produk" style="font-size:15px;" class="mb-1 text-center">Nama Produk</label>
                                                                        <textarea name="nama_produk" class="form-control" id="nama_produk"></textarea>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="berat_produk" style="font-size:15px;" class="mb-1 text-center">Berat Produk</label>
                                                                        <textarea name="berat_produk" class="form-control" id="berat_produk"></textarea>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="deskripsi_produk" style="font-size:15px;" class="mb-1">Deskripsi Produk</label>
                                                                        <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control"></textarea>
                                                                    </div>

                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <label for="harga_produk" style="font-size:15px;" class="mb-1">Harga Produk</label>
                                                                    <input type="text" class="form-control" id="harga_produk" name="harga_produk" placeholder="Harga Produk">
                                                                </div>

                                                                <div class="col">
                                                                    <label for="diskon_produk" style="font-size:15px;" class="mb-1">Diskon Produk (Tanpa Tanda %)</label>
                                                                    <input type="text" class="form-control" id="diskon_produk" name="diskon_produk" placeholder="Diskon Produk">
                                                                </div>

                                                                <div class="col">
                                                                    <label for="foto_produk" style="font-size:15px;" class="mb-1">Foto Produk</label>
                                                                    <input class="form-control" type="file" id="foto_produk" name="foto_produk" placeholder="Foto Produk">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" name="btambah">Confirm</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Tambah Data -->



                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="bhapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content text-center">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <form action="opsi-produk.php" method="POST">
                                                            <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                                                            <div class="modal-body">
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
                                            <!-- Akhir Modal Hapus Data -->


                                            <!-- Modal Gambar -->
                                            <div class="modal fade" id="bgambar<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Foto Produk</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body d-flex justify-content-center">
                                                            <div class="">
                                                                <img src="../../foto-produk/<?= $produk['foto_produk'] ?>" alt="" width="450" height="450">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Gambar -->
                                        <?php } ?>
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