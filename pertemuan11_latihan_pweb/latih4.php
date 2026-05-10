<?php
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    die("Could not connect: " . mysqli_connect_error());
}

mysqli_select_db($conn, "lat_dbase");

mysqli_query($conn, "INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('Khaesar', 'Juniardi', 29)");
mysqli_query($conn, "INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('Nanda', 'Nandul', 22)");

echo "Data berhasil ditambahkan";
mysqli_close($conn);
?>