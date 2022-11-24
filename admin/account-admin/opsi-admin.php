<?php
require '../../koneksi.php';

    // Fungsi Hapus
    if(isset($_POST['bhapus'])){

        $delete = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$_POST[id_admin]' ");

    
        if ($delete) {
            echo "<script>alert('your data has been deleted successfully');</script>";
		    echo"<script>window.location='admin.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
		    echo"<script>window.location='admin.php'</script>";
        }
    }


    // Fungsi Edit
    if(isset($_POST['bedit'])){

        $update = mysqli_query($koneksi, "UPDATE admin set nama_admin='$_POST[nama_admin]', username_admin='$_POST[username_admin]', password_admin='$_POST[password_admin]',tlp_admin='$_POST[tlp_admin]' WHERE id_admin='$_POST[id_admin]'");

    
        if ($update) {
            echo "<script>alert('your data has been successfully changed');</script>";
		    echo"<script>window.location='admin.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
		    echo"<script>window.location='admin.php'</script>";
        }
    }


    // Fungsi Tambah Akun
    if(isset($_POST['btambah'])){

        $create = mysqli_query($koneksi, "INSERT INTO admin VALUES (NULL, '$_POST[nama_admin]','$_POST[username_admin]', '$_POST[password_admin]', '$_POST[tlp_admin]')");

        $_SESSION['eksekusi'] = "Data Berhasil Ditambahkan";

        if ($create) {
            echo "<script>alert('Your data has been successfully added');</script>";
            echo"<script>window.location='admin.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
            echo"<script>window.location='admin.php'</script>";
        }
    }

