<?php
 
    require 'function.php';

    // ambil data di url
    $id = $_GET["id"];
    
    // query data murid berdasarkan id
    $md = query("SELECT * FROM tb_muridsmk WHERE id = $id")[0];

    if (isset($_POST["submit"]) ) {

        // cek apakah data berhasil di edit atau tidak
        if ( ubah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil di ubah!');
                    document.location.href = 'latihan2.php'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal di ubah!');
                    document.location.href = 'latihan2.php'
                </script>
            ";
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <title>Document</title>
</head>
<body>
    
    <div class="container1">

        <h1>update data murid</h1>
        <hr>
    
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $md["id"]; ?>">
            <ul>
                <li>
                    <label for="nrp">NRP : </label>
                    <input type="text" name="nrp" id="nrp" required value="<?= $md["nrp"]; ?>">
                </li>
                <br>
                <li>
                    <label for="nama">Nama : </label>
                    <input type="text" name="nama" id="nama" value="<?= $md["nama"]; ?>">
                </li>
                <br>
                <li>
                    <label for="email">Email : </label>
                    <input type="text" name="email" id="email" value="<?= $md["email"]; ?>">
                </li>
                <br>
                <li>
                    <label for="jurusan">Jurusan : </label>
                    <input type="text" name="jurusan" id="jurusan" value="<?= $md["jurusan"]; ?>">
                </li>
                <br>
                <li>
                    <label for="gambar">Gambar : </label>
                    <input type="text" name="gambar" id="gambar" value="<?= $md["gambar"]; ?>">
                </li>
                <br>
                <li>
                    <button type="submit" name="submit">simpan data</button>
                </li>
            </ul>
    
    
        </form>
    
        <a href="latihan2.php">kembali</a>
    </div>


</body>
</html>