<?php 
    session_start();
    include '../koneksi.php';

        $username = $_POST["username_admin"];
        $password = $_POST["password_admin"];

        // Cek Akun
        $ambil = $koneksi->query("SELECT * FROM admin WHERE username_admin='$username' and password_admin ='$password'");

        // ngitung akun yang terambil 
        $akunyangcocok = $ambil->num_rows;

        // Jika Akun Yang Cocok 1 (Login)
        if ($akunyangcocok == 1) {
            $akun  = $ambil->fetch_assoc();
            $_SESSION['admin'] = $akun;
            $_SESSION['id_admin'] = $akun['id_admin'];
            $_SESSION['nama'] = $akun['nama_admin'];

            echo "<script>alert('Anda berhasil Login');</script>";
            echo "<script>location = '../admin/dashboard/index.php';</script>";
        }else{
            // anda gagal login 
            echo "<script>alert('Anda gagal Login');</script>";
            echo "<script>location = 'login-admin.php';</script>";

           
            
        }



?>


