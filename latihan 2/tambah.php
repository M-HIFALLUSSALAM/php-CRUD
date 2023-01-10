<?php
 
    require 'function.php';
    if (isset($_POST["submit"]) ) {

        // cek apakah data berhasil di tambahkan atau tidak
        if ( tambah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil di tambahkan!');
                    document.location.href = 'latihan2.php'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal di tambahkan!');
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
    <title>Document</title>
</head>
<body>
    
    <h1>tambah data murid</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp">
            </li>
            <br>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama">
            </li>
            <br>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email">
            </li>
            <br>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <br>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">simpan</button>
            </li>
        </ul>


    </form>

    <a href="latihan2.php">kembali</a>

</body>
</html>