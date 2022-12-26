    <!DOCTYPE html>
    <html lang="en">

    <?php include '../header.php'; ?>
    <?php $admins = mysqli_query($koneksi, "SELECT * FROM admin"); ?>

    <body id="page-top" style="font-family: 'Poppins';">

        <div id="wrapper">
            <?php include '../navbar.php'; ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php include '../profile.php'; ?>
                    <div class="container-fluid">

                        <!-- Tabel Data Akun Admin -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <div class="col-md-7 ms-auto">
                                    <h5 class="mt-2 font-weight-bold text-primary">Table Data Akun Admin</h5>
                                </div>
                                <div class="" style="margin-left: 100px;"><a button class="btn btn-primary text-white " data-bs-toggle="modal" data-bs-target="#btambah"><i class="bi bi-plus-circle me-2"></i> Tambah Data Admin</a></div>

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
                                            foreach ($admins as $admin) { ?>
                                                <tr class="text-center">
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $admin['nama_admin'] ?></td>
                                                    <td><?= $admin['username_admin'] ?></td>
                                                    <td><?= $admin['password_admin'] ?></td>
                                                    <td><?= $admin['tlp_admin'] ?></td>
                                                    <td class="text-center">
                                                        <a button class="btn btn-success mx-1 text-white" data-bs-toggle="modal" data-bs-target="#bedit<?= $no ?>"><i class="bi bi-pencil-square"></i></a>
                                                        <a button class="btn btn-danger mx-1 text-white" data-bs-toggle="modal" data-bs-target="#bhapus<?= $no ?>"><i class="bi bi-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <!-- Akhir Tabel Data Akun Admin -->


                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="bedit<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hiddex`n="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Update Your Data</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                            </div>
                                                            <form action="opsi-admin.php" method="POST">
                                                                <div class="container col-md-12 mb-4">
                                                                    <div class="p-1">
                                                                        <div class="my-3">
                                                                            <input type="hidden" name="id_admin" value="<?= $admin['id_admin']; ?>">
                                                                            <label for="nama_admin" style="font-size:15px;" class="mb-1">Name</label>
                                                                            <input type="input" class="form-control" id="nama_admin" name="nama_admin" value="<?php echo $admin['nama_admin']; ?>" placeholder="Nama Lengkap" aria-label="Nama Lengkap">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="username" style="font-size:15px;" class="mb-1">Username</label>
                                                                            <input type="input" class="form-control" id="username_admin" name="username_admin" value="<?php echo $admin['username_admin']; ?>" placeholder="Username" aria-label="Username">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="password_admin" style="font-size:15px;" class="mb-1">Password</label>
                                                                            <input type="input" class="form-control" id="password_admin" name="password_admin" value="<?php echo $admin['password_admin']; ?>" placeholder="Password" aria-label="Password">
                                                                        </div>
                                                                        <div class="my-3">
                                                                            <label for="tlp_admin" style="font-size:15px;" class="mb-1">No.Telepon</label>
                                                                            <input type="input" class="form-control" id="tlp_admin" name="tlp_admin" value="<?php echo $admin['tlp_admin']; ?>" placeholder="Nomer Telepon" aria-label="Nomer Telepon">
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
                                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Admin</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                            </div>
                                                            <form action="opsi-admin.php" method="POST">
                                                                <div class="container col-md-12 mb-4">
                                                                    <div class="p-1">
                                                                        <div class="mb-3">
                                                                            <label for="nama_admin" style="font-size:15px;" class="mb-1">Name</label>
                                                                            <input type="input" class="form-control" id="nama_admin" name="nama_admin" placeholder="Nama Lengkap" aria-label="First name">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="username_admin" style="font-size:15px;" class="mb-1">Username</label>
                                                                            <input type="input" class="form-control" id="username_admin" name="username_admin" placeholder="Username" aria-label="Last name">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="password_admin" style="font-size:15px;" class="mb-1">Password</label>
                                                                            <input type="password" class="form-control" id="password_admin" name="password_admin" placeholder="Password" aria-label="Last name">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="tlp_admin" style="font-size:15px;" class="mb-1">No.Telepon</label>
                                                                            <input type="input" class="form-control" id="tlp_admin" name="tlp_admin" placeholder="No.Telepon" aria-label="First name">
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
                                                            <form action="opsi-admin.php" method="POST">
                                                                <input type="hidden" name="id_admin" value="<?= $admin['id_admin'] ?>">
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
                </div>
            </div>
        </div>
        <?php include '../footer.php'; ?>
    </body>
    </html>