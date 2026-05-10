<?php
$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "lat_dbase");

$hasil = mysqli_query($conn, "SELECT * FROM tbl_mhs");
while ($data = mysqli_fetch_row($hasil)) {
    echo "$data[0] $data[1] $data[2] $data[3]<br>";
}
mysqli_close($conn);
?>