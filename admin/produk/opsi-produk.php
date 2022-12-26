<?php
require '../../koneksi.php';


// Fungsi Tambah
if (isset($_POST['btambah'])) {
  $nama = $_FILES['foto_produk']['name'];
  $lokasi = $_FILES['foto_produk']['tmp_name'];
  $folder = '../../foto-produk/';

  $upload = move_uploaded_file($lokasi, '../../foto-produk/' . $nama);


  $sql = mysqli_query($koneksi, "INSERT INTO produk VALUES(NULL, '$_POST[nama_produk]','$_POST[berat_produk]','$_POST[harga_produk]','$nama', '$_POST[deskripsi_produk]','$_POST[diskon_produk]')");


  if ($sql == true) {
    echo "<script>alert('Produk Berhasil Ditambahkan');</script>";
    echo "<script>window.location='produk.php'</script>";
  } else {
    echo "<script>alert('Produk Gagal Ditambahkan');</script>";
    echo "<script>window.location='produk.php'</script>";
  }
}

// Fungsi Edit
if (isset($_POST['bedit'])) {

  $nama = $_FILES['foto_produk']['name'];
  $lokasi = $_FILES['foto_produk']['tmp_name'];
  move_uploaded_file($lokasi, "../../foto-produk/" . $nama);
  $update = mysqli_query($koneksi, "UPDATE `produk` SET `nama_produk`='$_POST[nama_produk]',`berat_produk`='$_POST[berat_produk]',`harga_produk`='$_POST[harga_produk]',`foto_produk`='$nama',`deskripsi_produk`='$_POST[deskripsi_produk]',`diskon_produk`='$_POST[diskon_produk]' WHERE id_produk='$_POST[id_produk]'");


  if ($update) {
    echo "<script>alert('Data Produk Berhasil Di Ubah');</script>";
    echo "<script>window.location='produk.php'</script>";
  } else {
    echo "<script>alert('Data Produk Gagal Di Ubah');</script>";
    echo "<script>window.location='produk.php'</script>";
  }
}

// Fungsi Hapus
if (isset($_POST['bhapus'])) {
  $delete = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk= '$_POST[id_produk]'");
  
  echo "<script>alert('Data Produk Berhasil Di Hapus');</script>";
  echo "<script>window.location='produk.php'</script>";

  
}
