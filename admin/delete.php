<?php

require '../koneksi.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id'");

    
        header("Location: index.php");
        }
