<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Not able to connect to server: " . mysqli_connect_error());
}
echo "ok....koneksi berhasil";
mysqli_close($conn);
?>