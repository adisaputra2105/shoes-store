<!DOCTYPE html>
<html lang="en">

<?php include '../header.php'; ?>
<?php $pelanggans = mysqli_query($koneksi, "SELECT * FROM pelanggan"); ?>

<body id="page-top" style="font-family: 'Poppins';">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../navbar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../profile.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <div class="col-md-7">
                                <h5 class="mt-2 font-weight-bold text-primary">Table Data Akun Pelanggan</h5>
                            </div>
                            <div class="me-auto" style="margin-left: 100px;"><a button class="btn btn-primary text-white " data-bs-toggle="modal" data-bs-target="#btambah"><i class="bi bi-plus-circle me-2"></i> Tambah Data Pelanggan</a></div>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table-dark">
                                        <tr class="text-center">
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">No.Telepon</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pelanggans as $pelanggan) { ?>
                                            <tr class="text-center">
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $pelanggan['nama_pelanggan'] ?></td>
                                                <td><?= $pelanggan['username_pelanggan'] ?></td>
                                                <td><?= $pelanggan['password_pelanggan'] ?></td>
                                                <td><?= $pelanggan['tlp_pelanggan'] ?></td>
                                                <td class="text-center">
                                                    <a button class="btn btn-success mx-1 text-white" data-bs-toggle="modal" data-bs-target="#bedit<?= $no ?>"><i class="bi bi-pencil-square"></i></a>
                                                    <a button class="btn btn-danger mx-1 text-white" data-bs-toggle="modal" data-bs-target="#bhapus<?= $no ?>"><i class="bi bi-trash"></i></a>
                                                </td>
                                            </tr>



                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="bedit<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Your Data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <form action="opsi-user.php" method="POST">
                                                            <div class="container col-md-12 mb-4">
                                                                <div class="p-1">
                                                                    <div class="my-3">
                                                                        <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']; ?>">
                                                                        <label for="nama_pelanggan" style="font-size:15px;" class="mb-1">Name</label>
                                                                        <input type="input" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $pelanggan['nama_pelanggan']; ?>" placeholder="Nama Lengkap" aria-label="Nama Lengkap">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="username" style="font-size:15px;" class="mb-1">Username</label>
                                                                        <input type="input" class="form-control" id="username_pelanggan" name="username_pelanggan" value="<?php echo $pelanggan['username_pelanggan']; ?>" placeholder="Username" aria-label="Username">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="password_pelanggan" style="font-size:15px;" class="mb-1">Password</label>
                                                                        <input type="input" class="form-control" id="password_pelanggan" name="password_pelanggan" value="<?php echo $pelanggan['password_pelanggan']; ?>" placeholder="Password" aria-label="Password">
                                                                    </div>
                                                                    <div class="my-3">
                                                                        <label for="tlp_pelanggan" style="font-size:15px;" class="mb-1">No.Telepon</label>
                                                                        <input type="input" class="form-control" id="tlp_pelanggan" name="tlp_pelanggan" value="<?php echo $pelanggan['tlp_pelanggan']; ?>" placeholder="Nomer Telepon" aria-label="Nomer Telepon">
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
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Pelanggan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <form action="opsi-user.php" method="POST">
                                                            <div class="container col-md-12 mb-4">
                                                                <div class="p-1">
                                                                    <div class="mb-3">
                                                                        <label for="nama_pelanggan" style="font-size:15px;" class="mb-1">Name</label>
                                                                        <input type="input" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Lengkap" aria-label="First name">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="username_pelanggan" style="font-size:15px;" class="mb-1">Username</label>
                                                                        <input type="input" class="form-control" id="username_pelanggan" name="username_pelanggan" placeholder="Username" aria-label="Last name">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="password_pelanggan" style="font-size:15px;" class="mb-1">Password</label>
                                                                        <input type="password" class="form-control" id="password_pelanggan" name="password_pelanggan" placeholder="Password" aria-label="Last name">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="tlp_pelanggan" style="font-size:15px;" class="mb-1">No.Telepon</label>
                                                                        <input type="input" class="form-control" id="tlp_pelanggan" name="tlp_pelanggan" placeholder="No.Telepon" aria-label="First name">
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
                                                            <h5 class="modal-title " id="exampleModalLabel">Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <form action="opsi-user.php" method="POST">
                                                            <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
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
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include '../footer.php'; ?>

</body>

</html>