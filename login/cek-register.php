<?php
include '../koneksi.php';

$name = $_POST['nama_pelanggan'];
$email = $_POST['email_pelanggan'];
$username = $_POST['username_pelanggan'];
$password = $_POST['password_pelanggan'];
$no_tlp = $_POST['tlp_pelanggan'];

$result = mysqli_query($koneksi, "INSERT INTO pelanggan (nama_pelanggan,email_pelanggan,username_pelanggan,password_pelanggan,tlp_pelanggan) VALUES( '$name','$email','$username','$password','$no_tlp')");
if ($result == true) {
    echo "<script>alert('Akun Anda Berhasil Di Buat');</script>";
    echo "<script>window.location='../index.php'</script>";
} else {
    echo "Username Anda Telah Digunakan";
}
