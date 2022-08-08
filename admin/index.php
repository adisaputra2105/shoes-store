<?php
require '../koneksi.php';
$users = mysqli_query($koneksi, "SELECT * FROM user");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventory | Supplier</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
 
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="text-right col-1">
        </div>
      </div>
    </div>
  </nav>
  <h1 class="text-center text-dark mt-3">ADMIN</h1>
  <div class="row justify-content-center mt-5">
    <div class="col-lg-10">
      <table class="table table-bordered table-hover shadow mt-4">
        <thead class="bg-dark text-white text-center text-md">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No.Telepon</th>
            <th>Alamat</th>
            <th>Paket</th>
            <th>Metode Pembayaran</th>
            <th>Pesan</th>
            <th>Bukti Pembayaran</th>
            <th>Materi Website</th>
            <th class="col-lg-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($users as $user) { ?>

            <tr align="center">
              <td><?= $no++; ?></td>
              <td><?= $user['nama_user'] ?></td>
              <td><?= $user['no_tlp'] ?></td>
              <td><?= $user['paket'] ?></td>
              <td><?= $user['alamat'] ?></td>
              <td><?= $user['pembayaran'] ?></td>
              <td><?= $user['pesan'] ?></td>
              <td><?= $user['bukti'] ?></td>
              <td><?= $user['materi'] ?></td>
             
              <td>
                <a button class="btn btn-success btn-sm ms-2 text-white" href="detail.php?id=<?= $user['id_user'] ?>">Hapus</a>
                <a button class="btn btn-danger btn-sm ms-2 text-white" href="delete.php?id=<?= $user['id_user'] ?>">Hapus</a>
              </td>

            </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>