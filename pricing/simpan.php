<?php

require '../koneksi.php';
$nama = $_POST['nama_user'];
$notelpon = $_POST['no_tlp'];
$alamat =  $_POST['alamat'];
$paket =  $_POST['paket'];
$pembayaran =  $_POST['pembayaran'];
$pesan_user =  $_POST['pesan'];
$bukti = $_FILES['bukti']['name'];
$source = $_FILES['bukti']['tmp_name'];
$folder = 'bukti/';
$materi = $_FILES['materi']['name'];
$source_materi = $_FILES['materi']['tmp_name'];
$folder_materi = 'materi/';

$upload = move_uploaded_file($source, 'bukti/' . $bukti);
$upload_materi = move_uploaded_file($source_materi, 'materi/' . $materi);


$sql = mysqli_query($koneksi, "INSERT INTO user VALUES (NULL, '$nama', '$notelpon', '$alamat', '$paket', '$pembayaran', '$pesan_user', '$bukti', '$materi')");

if($sql == true){
    echo "<script type='text/javascript'>alert('Your message Here');</script>";
    header('Location: index.php');
    }else{
    echo "<script type='text/javascript'>alert('Your message Here');</script>";

    }


?>
