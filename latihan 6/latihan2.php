<?php

session_start();

if( !isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'function.php';

$murid = query("SELECT * FROM tb_muridsmk");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
  $murid = cari($_POST["keyword"]);
}

$n = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>data siswa</title>
</head>
<body>


  <div class="container">

  <h1 class="title">Daftar siswa</h1>

  <a href="tambah.php" class="link">tambah data</a>
  <br><br><br>
  <a href="registrasi.php" class="link">Registrasi</a>
  <br><br><br>
  <a href="logout.php">keluar</a>

  <form action="" method="post" class="d-flex">
    <input class="form-control me-5" type="text" name="keyword" placeholder="search" autofocus autocomplete="off">

    <button class="btn btn-success" type="submit" name="cari">cari</button>
  </form>

    <table class="table table-bordered border-primary" border=1 cellpadding="10" cellspacing="0">

      <tr>
        <th>No.</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Aksi</th>
      </tr>

      <?php foreach($murid as $row) : ?>
      <tr>
        <th><?php echo $n++ ?></th>
        <td><img src="../img/<?php echo $row["gambar"]; ?>" width="50"></td>
        <td><?php echo $row["nrp"]; ?></td>
        <td><?php echo $row["nama"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["jurusan"]; ?></td>
        <td>
          <a href="edit.php?id=<?php echo $row["id"];?>"><i class="bi bi-pencil-square text-success"></i></a>   | 
          <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin deck :v');"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
      </tr>
      <?php endforeach; ?>

    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>