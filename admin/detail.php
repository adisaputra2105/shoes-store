<?php 
 include '../koneksi.php';

//  while ($a=mysqli_fetch_array($q)){

//     $data1 = isset($a['detail']);

//  }

 $q = mysqli_query($koneksi, "select * from user where id_user=['id_user']");
 $a = mysqli_fetch_array($q);
?>
         
<center>
    <div style="display: flex; justify-content: center;">
        <table class="table mt-4" bgcolor="white" style="width: 28%; border: 1px solid #6633ff;">
            <tr>
                <th colspan="3" align="center" style="font-size: 30px ;">Tiket Pesawat</th>
            </tr>
            <tr>
                <td>Kode Tiket</td>
                <td> : </td>
                <td><?= $a['nama_user']?></td>
            </tr>
            <tr>
                <td>Kode Pesawat</td>
                <td> : </td>
                <td><?= $a['no_tlp']?></td>
            </tr>
            <tr>
                <td>Kode Penumpang</td>
                <td> : </td>
                <td><?= $a['paket']?></td>
            </tr>
            <tr>
                <td>Tanggal Penerbangan</td>
                <td> : </td>
                <td><?= $a['alamat']?></td>
            </tr>
            <tr>
                <td>Waktu Berangkat</td>
                <td> : </td>
                <td><?= $a['pembayaran']?></td>
            </tr>
            <tr>
                <td>Waktu Sampai</td>
                <td> : </td>
                <td><?= $a['pesan']?></td>
            </tr>
            <tr>
                <td>Berangkat</td>
                <td> : </td>
                <td><?= $a['bukti']?></td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td> : </td>
                <td><?= $a['materi']?></td>
            </tr>
        </table>
    </div>
</center>
