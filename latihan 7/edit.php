<?php
 
 session_start();

 if( !isset($_SESSION["login"])) {
     header("location: login.php");
     exit;
 }

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
                    document.location.href = 'index.php'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal di ubah!');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
    <div class="container1">

        <h1 class="text-center">Update Data Murid</h1>
        <hr>
    
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $md["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $md["gambar"]; ?>">
            <ul>
                <li>
                    <label for="nrp">NRP : </label>
                    <input class="form-control" type="text" name="nrp" id="nrp" required value="<?= $md["nrp"]; ?>">
                </li>
                <br>
                <li>
                    <label for="nama">Nama : </label>
                    <input class="form-control" type="text" name="nama" id="nama" value="<?= $md["nama"]; ?>">
                </li>
                <br>
                <li>
                    <label for="email">Email : </label>
                    <input class="form-control" type="text" name="email" id="email" value="<?= $md["email"]; ?>">
                </li>
                <br>
                <li>
                    <label for="jurusan">Jurusan : </label>
                    <input class="form-control" type="text" name="jurusan" id="jurusan" value="<?= $md["jurusan"]; ?>">
                </li>
                <br>
                <li>
                    <label for="gambar">Gambar : </label><br><br>
                    <img src="../img/<?= $md['gambar']; ?>" width="100"><br><br>
                    <input class="form-control" type="file" name="gambar" id="gambar">
                </li>
                <br>
                <li>
                    <button type="submit" name="submit" class="btn btn-success">simpan data</button>
                    <a href="index.php" class="btn btn-warning ms-3">kembali</a>
                </li>
            </ul>
    
    
        </form>
    
    </div>


</body>
</html>