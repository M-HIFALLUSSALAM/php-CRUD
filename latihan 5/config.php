<?php
$hostname = "localhost";
$database = "db_murid";
$username = "root";
$password = "";
$conn = mysqli_connect($hostname, $username, $password, $database);
// script cek koneksi
if (!$conn) {
    die("nyasar min awokawok !!! " . mysqli_connect_error());
}
?> 