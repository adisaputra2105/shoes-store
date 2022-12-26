<?php

// Fungsi Hapus
require '../../koneksi.php';
if (isset($_POST['bhapus'])) {
    $id = $_POST['id_transaksi'];
    $sql = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi= '$id'");


    if ($sql) {
        echo "<script>alert('your data has been deleted successfully');</script>";
        echo "<script>window.location='pesanan.php'</script>";
    } else {
        echo "<script>alert('Gagal');</script>";
        echo "<script>window.location='pesanan.php'</script>";
    }
}

// Fungsi Accept
if (isset($_POST['accept'])) {
    $id = $_POST['id_transaksi'];

    $select = "UPDATE transaksi SET status = 'accept' WHERE id_transaksi = '$id'";
    $result = mysqli_query($koneksi, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("Pesanan Telah Di Konfirmasi");';
    echo 'window.location.href = "pesanan.php"';
    echo '</script>';
}

// Fungi Reject
if (isset($_POST['reject'])) {
    $id = $_POST['id_transaksi'];

    $select = "UPDATE transaksi SET status = 'reject' WHERE id_transaksi = '$id'";
    $result = mysqli_query($koneksi, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("Pesanan Di Tolak");';
    echo 'window.location.href = "pesanan.php"';
    echo '</script>';
}

// Fungsi Done
if (isset($_POST['done'])) {
    $id = $_POST['id_transaksi'];

    $select = "UPDATE transaksi SET status = 'done' WHERE id_transaksi = '$id'";
    $result = mysqli_query($koneksi, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("Pesanan Sudah Selesai");';
    echo 'window.location.href = "pesanan.php"';
    echo '</script>';
}

// Fungsi Pesanan Di Terima
if (isset($_POST['diterima'])) {
    $id = $_POST['id_transaksi'];

    $result = $koneksi->query("UPDATE transaksi SET status = 'diterima' WHERE id_transaksi = '$id'");
    if ($result == true):
    echo '<script type = "text/javascript">';
    echo 'alert("Pesanan Anda Sudah Di Terima");';
    echo 'window.location.href = "../../order/order.php"';
    echo '</script>';
    else:
        echo '<script type = "text/javascript">';
    echo 'alert("Pesanan Anda Gagal Di Terima");';
    echo 'window.location.href = "../../order/order.php"';
    echo '</script>';
    endif;
}
