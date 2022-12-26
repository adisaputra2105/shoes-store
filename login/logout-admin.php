<?php
//function start lagi
session_start();

//cek apakah session terdaftar
if ($_SESSION['admin']) {

	//session terdaftar, saatnya logout
	session_unset();
	session_destroy();
	echo "<script>alert('Anda Berhasil Logout');</script>";
	echo"<script>window.location='../../login/login-admin.php'</script>";
} else {

	header("Location: ../index.php");
}
