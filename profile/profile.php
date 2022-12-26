<?php require '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include '../layout/header.php'; ?>

<body>
    <div class="container">
        <?php
        $id    = $_SESSION['id_pelanggan'];
        $sql    = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id'");
        $data    = mysqli_fetch_array($sql);
        if (mysqli_num_rows($sql) > 0) {
            $nama = $data['nama_pelanggan'];
            $email = $data['email_pelanggan'];
            $username = $data['username_pelanggan'];
            $password = $data['password_pelanggan'];
            $no_tlp = $data['tlp_pelanggan'];
            $img = $data['foto_profile'];
        }
        ?>

        <div class="container mt-5 mb-5 px-5 py-5">
            <div class="card ms-5 me-5 shadow">
                <div class="card-header mb-2 d-flex justify-content-center" style="background-color: #0F3460;">
                    <span class="fs-3 text-white">Profile</span>
                </div>

                <?php
                if (isset($_POST['bubah'])) { ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="card-body row px-5 py-5 align-items-center">
                            <div class="d-flex justify-content-xs-center flex-column align-items-center col-md-4 mb-5">
                                <?php if ($img == '') { ?>
                                    <div class="mb-3">
                                        <img src="../assets/person-circle.svg" width="200" alt="">
                                    </div>
                                <?php } else { ?>
                                    <div class="mb-3">
                                        <img class="rounded-circle" src="../foto-profile/<?= $data['foto_profile'] ?>" alt="" width="250" height="250">
                                    </div>
                                <?php } ?>
                                <div class="mb-3">
                                    <input class="form-control d-none" name="foto_profile" type="file" id="img">
                                    <label class="btn btn-primary" for="img">Ubah Foto</label>
                                </div>
                            </div>
                            <div class="col-md-8 pe-5">
                                <input type="hidden" name="id_pelanggan" value="<?= $_SESSION['id_pelanggan']; ?>">
                                <div class="mb-3">
                                    <label for="nama_pelanggan" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_pelanggan" class="form-control" id="nama" aria-describedby="emailHelp" value="<?= $nama ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email_pelanggan" class="form-control" id="email" value="<?= $email ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username_pelanggan" class="form-control" id="username" value="<?= $username ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" name="password_pelanggan" class="form-control" id="password" value="<?= $password ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="no_tlp" class="form-label">No. Telepon</label>
                                    <input type="text" name="tlp_pelanggan" class="form-control" id="no_tlp" value="<?= $no_tlp ?>">
                                </div>
                                <div class="d-flex justify-content-between mt-3 text-white col-md-12">
                                    
                                        <button type="submit" class="btn btn-danger me-1  text-white col-md-6" name="bbatal">Batal</button>
                                        <button type="submit" class="btn btn-success ms-1 text-white col-md-6" name="bkirim">kirim</button>
                                
                                </div>
                    </form>
                <?php } else { ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="card-body row align-content-center justify-content-center px-5 py-5">
                            <div class="d-flex justify-content-xs-center flex-column align-items-center col-md-12 mb-5">
                                <?php if ($img == '') { ?>
                                    <div class="mb-3">
                                        <img src="../assets/person-circle.svg" width="150" alt="">
                                    </div>
                                <?php } else { ?>
                                    <div class="mb-3">
                                        <img class="rounded-circle" src="../foto-profile/<?= $data['foto_profile'] ?>" alt="" width="150" height="150">
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <input type="hidden" name="id" value="<?= $_SESSION['id_pelanggan']; ?>">
                                <div class="mb-3 col-md-6">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" value="<?= $nama ?>" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="<?= $email ?>" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" value="<?= $username ?>" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" value="<?= $password ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="telp" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="telp" value="<?= $no_tlp ?>" disabled>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn text-white col-md-12" style="background-color: #FF5B00;" name="bubah">ubah</button>
                                </div>
                            </div>
                        <?php } ?>
                    </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['bkirim'])) {

        $folder = '../foto-profile';
        $img = $_FILES['foto_profile']['name'];
        $source = $_FILES['foto_profile']['tmp_name'];

        $upload = move_uploaded_file($source, '../foto-profile/' . $img);

        $update = mysqli_query($koneksi, "UPDATE pelanggan set nama_pelanggan='$_POST[nama_pelanggan]',email_pelanggan='$_POST[email_pelanggan]',username_pelanggan='$_POST[username_pelanggan]', password_pelanggan='$_POST[password_pelanggan]',tlp_pelanggan='$_POST[tlp_pelanggan]', foto_profile='$img'  WHERE id_pelanggan='$_POST[id_pelanggan]'");


        if ($update) {
            // move_uploaded_file($_FILES['img']['tmp_name'], "../foto-profile/".$_FILES['img']['name']);
            echo "<script>alert('your data has been successfully changed');</script>";
            echo "<script>window.location='profile.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
            echo "<script>window.location='profile.php'</script>";
        }
    }
    ?>

</body>

</html>