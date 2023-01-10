<?php

require 'function.php';

if( isset($_POST["register"]) ) {
    
  if( registrasi($_POST) > 0 ) {
      echo "<script>
              alert('Nice Bro lu dah masuk');
            </script>";
  } else {
      echo mysqli_error($conn);
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>registrasi</title>
</head>
<body>
    
    <div class="container">
      <div class="content">

      <form action="" method="post">
        <h1>REGISTRASI SISWA</h1>
        <hr>
          <ul>
            <li>
              <label for="username">Username :</label>
              <input type="text" name="username" id="username" placeholder="Masukan Username">
            </li>
            <li>
              <label for="password">Password :</label>
              <input type="password" name="password" id="password" placeholder="Masukan Password">
            </li>
            <li>
              <label for="konfirmasi">Konfimasi Password :</label>
              <input type="password" name="konfirmasi" id="konfirmasi" placeholder="Konfimasi Password">
            </li>
            <br><br>
            <button type="submit" name="register"><i class="bi bi-person-plus-fill"></i>Registrasi</button>
          </ul>
  
          <a href="latihan2.php"><i class="bi bi-backspace-fill"></i>Kembali</a>
      </form>

          
      </div>
    </div>

    
      
</body>
</html>

