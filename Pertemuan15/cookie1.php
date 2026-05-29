<?php
$value = 'mkhaesarj';
$value2 = 'muhammad khaesar juniardi';

// Membuat cookie tanpa batas waktu eksplisit (hilang saat browser ditutup)
setcookie("username", $value);

// Membuat cookie dengan batas waktu kedaluwarsa 1 jam (3600 detik)
setcookie("namalengkap", $value2, time()+3600); /* expire in 1 hour */

echo "<h1>Ini halaman pengesetan cookie</h1>";
echo "<h2>Klik <a href='cookie2.php'>di sini</a> untuk pemeriksaan cookies</h2>";
?>