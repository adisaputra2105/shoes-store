<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($data);
if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['login'] = 1;
    header("location:menu.php");
} else {

    header("location:index.php?pesan=gagal");
}
