<?php
$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "lat_dbase");

$hasil = mysqli_query($conn, "SELECT * FROM tbl_mhs");
$hit = mysqli_num_rows($hasil);
echo "jumlah record: $hit";

mysqli_close($conn);
?>