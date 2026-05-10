<?php
$conn = mysqli_connect("localhost", "root", "");
$dbname = "lat_dbase";

$sql = "CREATE DATABASE $dbname";
if (mysqli_query($conn, $sql)) {
    echo "Database $dbname berhasil dibuat";
} else {
    echo "Couldn't Create Database: " . mysqli_error($conn);
}
mysqli_close($conn);
?>