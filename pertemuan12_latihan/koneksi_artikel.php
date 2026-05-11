<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "artikel_db";

// Koneksi dan pilih database sekaligus
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connection) {
    die("Tidak dapat terhubung dengan database: " . mysqli_connect_error());
}

echo "Koneksi berhasil. Database $dbname terpilih.";
// mysqli_close($connection);  // Tutup sementara agar bisa digunakan di file lain
?>