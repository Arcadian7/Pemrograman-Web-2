<?php
$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "lat_dbase");

// Membuat tabel
$sql_table = "CREATE TABLE tbl_mhs (
    mhsID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(mhsID),
    FirstName varchar(15),
    LastName varchar(15),
    Age int
)";

if (mysqli_query($conn, $sql_table)) {
    echo "Tabel berhasil dibuat<br>";
} else {
    echo "Error membuat tabel: " . mysqli_error($conn) . "<br>";
}

// Menyisipkan data
$sql_insert = "INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('Anjar', 'Prabowo', 25)";
if (mysqli_query($conn, $sql_insert)) {
    echo "Data berhasil disisipkan";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>