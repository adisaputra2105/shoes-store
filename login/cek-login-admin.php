<?php 
    // jika tombol ditekan 
    session_start();
    include '../koneksi.php';

        $username = $_POST["username_admin"];
        $password = $_POST["password_admin"];

        // lakukan query cek akun 
        $ambil = $koneksi->query("SELECT * FROM admin WHERE username_admin='$username' and password_admin ='$password'");

        // ngitung akun yang terambil 
        $akunyangcocok = $ambil->num_rows;

        // jk akun yang cocok 1 (Login)
        if ($akunyangcocok == 1) {
            $akun  = $ambil->fetch_assoc();
            $_SESSION["admin"] = $akun;

            echo "<script>alert('Anda berhasil Login');</script>";
            echo "<script>location = '../admin/dashboard/index.php';</script>";
        }else{
            // anda gagal login 
            echo "<script>alert('Anda gagal Login');</script>";
            echo "<script>location = '../login.php';</script>";

           
            
        }



?>


