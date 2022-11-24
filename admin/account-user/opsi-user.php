<?php
require '../../koneksi.php';

    // Fungsi Hapus
    if(isset($_POST['bhapus'])){

        $delete = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '$_POST[id_pelanggan]' ");

    
        if ($delete) {
            echo "<script>alert('your data has been deleted successfully');</script>";
		    echo"<script>window.location='user.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
		    echo"<script>window.location='user.php'</script>";
        }
    }


    // Fungsi Edit
    if(isset($_POST['bedit'])){

        $update = mysqli_query($koneksi, "UPDATE pelanggan set nama_pelanggan='$_POST[nama_pelanggan]', username_pelanggan='$_POST[username_pelanggan]', password_pelanggan='$_POST[password_pelanggan]',tlp_pelanggan='$_POST[tlp_pelanggan]' WHERE id_pelanggan='$_POST[id_pelanggan]'");

    
        if ($update) {
            echo "<script>alert('your data has been successfully changed');</script>";
		    echo"<script>window.location='user.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
		    echo"<script>window.location='user.php'</script>";
        }
    }


    // Fungsi Tambah Akun
    if(isset($_POST['btambah'])){

        $create = mysqli_query($koneksi, "INSERT INTO pelanggan VALUES (NULL, '$_POST[nama_pelanggan]','$_POST[username_pelanggan]', '$_POST[password_pelanggan]', '$_POST[tlp_pelanggan]')");

        $_SESSION['eksekusi'] = "Data Berhasil Ditambahkan";

        if ($create) {
            echo "<script>alert('Your data has been successfully added');</script>";
            echo"<script>window.location='user.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
            echo"<script>window.location='user.php'</script>";
        }
    }

