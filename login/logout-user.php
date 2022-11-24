<?php
//function start lagi
session_start();

//cek apakah session terdaftar
if ($_SESSION['user']) {

	//session terdaftar, saatnya logout
	session_unset();
	session_destroy();
	echo "<script>alert('Anda Berhasil Logout');</script>";
	echo"<script>window.location='../index.php'</script>";
} else {

	header("Location: ../index.php");
}
