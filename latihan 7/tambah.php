<?php

session_start();

if( !isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
 
    require 'function.php';
    if (isset($_POST["submit"]) ) {


        // cek apakah data berhasil di tambahkan atau tidak
        if ( tambah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil di tambahkan!');
                    document.location.href = 'index.php'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal di tambahkan!');
                    document.location.href = 'index.php'
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
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>tambah</title>
</head>
<body>

    <div class="container1">
        
        <h1 class="add text-center">TAMBAH DATA SISWA</h1>
        <hr>
    
        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="nrp">NRP : </label>
                    <input class="form-control" type="text" name="nrp" id="nrp">
                </li>
                <br>
                <li>
                    <label for="nama">Nama : </label>
                    <input class="form-control" type="text" name="nama" id="nama">
                </li>
                <br>
                <li>
                    <label for="email">Email : </label>
                    <input class="form-control" type="text" name="email" id="email">
                </li>
                <br>
                <li>
                    <label for="jurusan">Jurusan : </label>
                    <input class="form-control" type="text" name="jurusan" id="jurusan">
                </li>
                <br>
                <li>
                    <label for="gambar">Gambar : </label>
                    <input class="form-control" type="file" name="gambar" id="gambar">
                </li>
                <br>
                <li>
                    <button type="submit" name="submit" class="btn btn-success me-2">simpan</button>
                    <a href="index.php" class="btn btn-warning">kembali</a>
                </li>
            </ul>
    
    
        </form>
    

    </div>
    

</body>
</html>