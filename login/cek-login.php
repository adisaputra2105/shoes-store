<?php 
    // jika tombol ditekan 
    session_start();
    include '../koneksi.php';

        $username = $_POST["username_pelanggan"];
        $password = $_POST["password_pelanggan"];

        // lakukan query cek akun 
        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE username_pelanggan='$username' and password_pelanggan ='$password'");

        // ngitung akun yang terambil 
        $akunyangcocok = $ambil->num_rows;

        // jk akun yang cocok 1 (Login)
        if ($akunyangcocok == 1) {
            $akun  = $ambil->fetch_array();
            $_SESSION['id_pelanggan'] = $akun['id_pelanggan'];
            $_SESSION['nama_pelanggan'] = $akun['nama_pelanggan'];
            $_SESSION['tlp_pelanggan'] = $akun['tlp_pelanggan'];
            $_SESSION["pelanggan"] = $akun;
            $_SESSION['user'] = true;

            echo "<script>alert('Anda berhasil Login');</script>";
            echo "<script>location = '../index.php';</script>";
        }else{
            // anda gagal login 
            echo "<script>alert('Anda gagal Login');</script>";
            echo "<script>location = 'index.php';</script>";

           
            
        }



?>


