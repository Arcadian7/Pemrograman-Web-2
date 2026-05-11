<?php
// Koneksi ke database lat_dbase
$koneksi = mysqli_connect("localhost", "root", "", "lat_dbase");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query UPDATE: ubah umur Abdul Azis (mhsID=4) menjadi 20
$sql = "UPDATE tbl_mhs SET Age = '20' WHERE FirstName = 'Abdul' AND LastName = 'Azis'";

if (mysqli_query($koneksi, $sql)) {
    $jumlah = mysqli_affected_rows($koneksi);
    echo "Record berhasil diUPDATE. Jumlah baris terpengaruh: $jumlah";
} else {
    echo "Error: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>