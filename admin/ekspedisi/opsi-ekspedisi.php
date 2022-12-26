<?php
require '../../koneksi.php';

    // Fungsi Hapus
    if(isset($_POST['bhapus'])){

        $delete = mysqli_query($koneksi, "DELETE FROM ekspedisi WHERE id_ekspedisi = '$_POST[id_ekspedisi]' ");

    
        if ($delete) {
            echo "<script>alert('your data has been deleted successfully');</script>";
		    echo"<script>window.location='ekspedisi.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
		    echo"<script>window.location='ekspedisi.php'</script>";
        }
    }


    // Fungsi Edit
    if(isset($_POST['bedit'])){

        $update = mysqli_query($koneksi, "UPDATE ekspedisi set ekspedisi='$_POST[ekspedisi]', ongkir='$_POST[ongkir]', biaya_admin='$_POST[biaya_admin]' WHERE id_ekspedisi='$_POST[id_ekspedisi]'");

    
        if ($update) {
            echo "<script>alert('your data has been successfully changed');</script>";
		    echo"<script>window.location='ekspedisi.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
		    echo"<script>window.location='ekspedisi.php'</script>";
        }
    }


    // Fungsi Tambah Akun
    if(isset($_POST['btambah'])){

        $create = mysqli_query($koneksi, "INSERT INTO ekspedisi VALUES (NULL, '$_POST[ekspedisi]','$_POST[ongkir]', '$_POST[biaya_admin]')");

        $_SESSION['eksekusi'] = "Data Berhasil Ditambahkan";

        if ($create) {
            echo "<script>alert('Your data has been successfully added');</script>";
            echo"<script>window.location='ekspedisi.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
            echo"<script>window.location='ekspedisi.php'</script>";
        }
    }

