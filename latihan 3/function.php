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
        $gambar = htmlspecialchars($data["gambar"]);


    $query = "INSERT INTO tb_muridsmk
                VALUES
            ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

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
        $gambar = htmlspecialchars($data["gambar"]);


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

?>

