<?php
require 'function.php';
$murid = query("SELECT * FROM tb_muridsmk");

$n = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data siswa</title>
</head>
<body>

<h1>Daftar siswa</h1>
    
    <table border=1 cellpadding="10" cellspacing="0">

      <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
      </tr>

      <?php foreach($murid as $row) : ?>
      <tr>
        <td><?php echo $n++ ?></td>
        <td>
          <a href="">ubah</a> I 
          <a href="">hapus</a>
        </td>
        <td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>
        <td><?php echo $row["nrp"]; ?></td>
        <td><?php echo $row["nama"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["jurusan"]; ?></td>
      </tr>
      <?php endforeach; ?>

    </table>

</body>
</html>