<html>
<head><title>Contoh Penggunaan UDF</title></head>
<body>

<!-- Menentukan Form Input -->
<form method="POST">
Masukkan Bilangan Pertama : <br>
<input type="text" name="A" size="10"> <br>
Masukkan Bilangan Kedua : <br>
<input type="text" name="B" size="10"> <br>
<input type="submit" value="hitung">
</form>

<?php
if (isset($_POST['A']) && isset($_POST['B'])) {
    $a = $_POST["A"];
    $b = $_POST["B"];

    function jumlah($a, $b) {
        return $a + $b;
    }

    function kurang($a, $b) {
        return $a - $b;
    }

    function kali($a, $b) {
        return $a * $b;
    }

    function bagi($a, $b) {
        return $b != 0 ? $a / $b : "Tidak bisa dibagi nol";
    }

    echo "<br>";
    echo "Bilangan Pertama : $a <br>";
    echo "Bilangan Kedua : $b <br><br>";

    echo "Hasil Penjumlahan: " . jumlah($a, $b) . "<br>";
    echo "Hasil Pengurangan: " . kurang($a, $b) . "<br>";
    echo "Hasil Perkalian: " . kali($a, $b) . "<br>";
    echo "Hasil Pembagian: " . bagi($a, $b) . "<br>";
}
?>

</body>
</html>