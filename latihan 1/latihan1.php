<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_murid");

// ambil data dari tabel murid
$result = mysqli_query($conn, "SELECT * FROM tb_muridsmk");


// while ( $mds = mysqli_fetch_assoc($result) ) {
//   var_dump($mds);
// }

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

      <?php while($row = mysqli_fetch_assoc($result) ) : ?>
      <tr>
        <td><?php echo $n++ ?></td>
        <td>
          <a href="">ubah</a> I 
          <a href="">hapus</a>
        </td>
        <td><img src="img/<?php echo $row["gambar"] ?>" width="50"></td>
        <td><?php echo $row["nrp"] ?></td>
        <td><?php echo $row["nama"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["jurusan"] ?></td>
      </tr>
      <?php endwhile?>

    </table>

</body>
</html>