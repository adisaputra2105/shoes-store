<?php
require '../../koneksi.php';




if (isset($_POST['btambah'])) {
  // $id_produk = $_SESSION['id_produk'];
  // $nama_produk =  $_POST['nama_produk'];
  // $harga_produk = $_POST['harga_produk'];
  // $warna_produk =  $_POST['warna_produk'];
  // $ukuran_produk =  $_POST['ukuran_produk'];
  // $deskripsi_produk =  $_POST['deskripsi_produk'];
  $nama = $_FILES['foto_produk']['name'];
  $lokasi = $_FILES['foto_produk']['tmp_name'];
  $folder = '../../foto-produk/';

  $upload = move_uploaded_file($lokasi, '../../foto-produk/' . $nama);


  $sql = mysqli_query($koneksi, "INSERT INTO produk VALUES(NULL, '$_POST[nama_produk]','$_POST[harga_produk]','$nama', '$_POST[warna_produk]', '$_POST[ukuran_produk]','$_POST[deskripsi_produk]')");


  if ($sql == true) {
    echo "<script>alert('Produk Berhasil Ditambahkan');</script>";
    echo "<script>window.location='produk.php'</script>";
  } else {
    echo "<script>alert('Produk Gagal Ditambahkan');</script>";
    echo "<script>window.location='produk.php'</script>";
  }
}

if (isset($_POST['bedit'])) {

  $nama = $_FILES['foto_produk']['name'];
  $lokasi = $_FILES['foto_produk']['tmp_name'];
  move_uploaded_file($lokasi, "../../foto-produk/" . $nama);
  $update = mysqli_query($koneksi, "UPDATE produk set nama_produk='$_POST[nama_produk]', harga_produk='$_POST[harga_produk]', foto_produk ='$nama', ukuran_produk='$_POST[ukuran_produk]', deskripsi_produk='$_POST[deskripsi_produk]' WHERE id_produk='$_POST[id_produk]'");


  if ($update) {
    echo "<script>alert('Data Produk Berhasil Di Ubah');</script>";
    echo "<script>window.location='produk.php'</script>";
  } else {
    echo "<script>alert('Data Produk Gagal Di Ubah');</script>";
    echo "<script>window.location='produk.php'</script>";
  }
}

if (isset($_POST['bhapus'])) {
  $delete = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk= '$_POST[id_produk]'");

  $pecah = $ambil->fetch_assoc();
  $fotoproduk = $pecah['foto_PRODUKproduk'];
  if (file_exists("../../foto-produk/$fotoproduk")) {

    unlink("../../foto-produk/$fotoproduk");
  }
  
  echo "<script>alert('Data Produk Berhasil Di Hapus');</script>";
  echo "<script>window.location='produk.php'</script>";

  
}
