<?php
$conn = mysqli_connect("localhost", "root", "", "buku_tamu");
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$sql = "INSERT INTO guestbook (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
if (mysqli_query($conn, $sql)) {
    echo "Terima kasih sudah mengisi buku tamu.<br>";
    echo "<a href='form_buku_tamu.php'>Kembali</a> | <a href='tampil_buku_tamu.php'>Lihat Buku Tamu</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>