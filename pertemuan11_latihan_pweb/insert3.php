<?php
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    die("Could not connect: " . mysqli_connect_error());
}
mysqli_select_db($conn, "lat_dbase");

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];

$sql = "INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('$firstname', '$lastname', '$age')";

if (mysqli_query($conn, $sql)) {
    echo "1 record added";
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>