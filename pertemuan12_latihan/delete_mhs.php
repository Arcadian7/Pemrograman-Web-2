<?php
$koneksi = mysqli_connect("localhost", "root", "", "lat_dbase");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Hapus record dengan LastName = 'Nandul'
$sql = "DELETE FROM tbl_mhs WHERE LastName = 'Nandul'";

if (mysqli_query($koneksi, $sql)) {
    $jumlah = mysqli_affected_rows($koneksi);
    echo "Record berhasil diDELETE. Jumlah baris terhapus: $jumlah";
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>