<?php 

// koneksi ke databse
$conn = mysqli_connect("localhost", "root", "", "db_murid");

  function query($query) {
      global $conn;
      $result = mysqli_query($conn, $query);
      $rows = [];
      while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
      }
      return $rows;
    }

    function tambah($data) {
        global $conn;

        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        // upload gambar
        $gambar = upload();

        if (!$gambar) {
          return false;
        }


    $query = "INSERT INTO tb_muridsmk
                VALUES
            ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

    }


    function upload() {
      
      $namaFile = $_FILES['gambar']['name'];
      $ukuranFile = $_FILES['gambar']['size'];
      $error = $_FILES['gambar']['error'];
      $tnpName = $_FILES['gambar']['tmp_name'];

      // cek apakah ada gambar yg diupload
      if( $error === 4 ) {
        echo "<script>
                alert('pilih gambar dulu');
              </script>";
          return false;
      }

      // cek gambar atau bukan
      $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
      $ekstensiGambar = explode('.', $namaFile);
      $ekstensiGambar = strtolower (end($ekstensiGambar));

      if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda upload bukan gambar!!!');
              </script>";
          return false;
      }

      // cek jika ukurannya terlalu besar
      if( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('ukuran gamabr terlau besar');
              </script>";
          return false;
      }

      // lolos pengecekan gambar siap di upload
      // generate nama gambar baru

      $namaFileBaru = uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensiGambar;

      move_uploaded_file($tnpName, '../img/' . $namaFileBaru);

      return $namaFileBaru;
        
    }

    function hapus($id) {
      global $conn;
      mysqli_query($conn, "DELETE FROM tb_muridsmk WHERE id = $id");

      return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambarLama = ($data["gambarLama"]);
        
        //cek apakah user pilih gambar baru
        if($_FILES['gambar']['error'] === 4 ) {
          $gambar = $gambarLama;
        } else {
          $gambar = upload();
        }


    $query = "UPDATE tb_muridsmk SET
              nrp = '$nrp',
              nama = '$nama',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'

              WHERE id = $id
              
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

    }

    function cari($keyword) {
      $query = "SELECT * FROM tb_muridsmk WHERE
                nama LIKE '%$keyword%' OR
                nrp LIke '%$keyword%' OR
                email LIke '%$keyword%' OR
                jurusan LIke '%$keyword%'
                ";

          return query($query);
              
    }

    function registrasi($data) {
      global $conn;
    
      $username = strtolower(stripslashes($data["username"]));
      $password = mysqli_real_escape_string($conn, $data["password"]);
      $konfirmasi = mysqli_real_escape_string($conn, $data["konfirmasi"]);
    
      // cek username sudah ada atau belum
      $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");
    
      if( mysqli_fetch_assoc($result) ) {
        echo "<script>
            alert('username wes ono lhur')
              </script>";
        return false;
      }
    
    
      // cek konfirmasi password
      if( $password !== $konfirmasi ) {
        echo "<script>
            alert('NT bro password nya ga sama awokawok');
              </script>";
        return false;
      }
    
      // enkripsi password
      $password = password_hash($password, PASSWORD_DEFAULT);
    
      // tambahkan userbaru ke database
      mysqli_query($conn, "INSERT INTO tb_user VALUES('', '$username', '$password')");
    
      return mysqli_affected_rows($conn);
    
    }
    
    
?>

