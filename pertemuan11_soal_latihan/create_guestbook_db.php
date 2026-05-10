<?php
$conn = mysqli_connect("localhost", "root", "");

// Buat database
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS buku_tamu");
mysqli_select_db($conn, "buku_tamu");

// Buat tabel
$sql = "CREATE TABLE IF NOT EXISTS guestbook (
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    nama VARCHAR(100),
    email VARCHAR(100),
    pesan TEXT,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $sql);
echo "Database dan tabel siap";
mysqli_close($conn);
?>