<?php
// =======================
// DATA PERALATAN
// =======================
$brg1 = "Buku";
$brg2 = "Mouse";
$brg3 = "FlashDisk";
$brg4 = "Pulpen";

$harga1 = 17500;
$harga2 = 30000;
$harga3 = 70000;
$harga4 = 22300;

$jmlbrg1 = 2;
$jmlbrg2 = 5;
$jmlbrg3 = 1;
$jmlbrg4 = 3;

// =======================
// PERHITUNGAN
// =======================
$th1 = $jmlbrg1 * $harga1;
$th2 = $jmlbrg2 * $harga2;
$th3 = $jmlbrg3 * $harga3;
$th4 = $jmlbrg4 * $harga4;

$tharga = $th1 + $th2 + $th3 + $th4;

$diskon = 5;
$tdiskon = ($diskon * $tharga) / 100;

$tdibayar = $tharga - $tdiskon;
?>

<html>
<head>
    <title>Daftar Peralatan Yang Dibeli</title>
</head>

<style type="text/css">
body {
    font-size: 14pt;
}
table {
    font-size: 14pt;
    border-collapse: collapse;
}
td {
    padding: 5px;
}
</style>

<body>
<center>

<font face="comic sans serif" size="5" color="blue">
Contoh Perhitungan dengan PHP
</font>

<br><br>

<table border="1" cellspacing="0" cellpadding="3">

<tr>
    <td colspan="4" align="center">
        <b>Daftar Pemesanan Peralatan Kantor</b>
    </td>
</tr>

<tr>
    <td><b>Nama Peralatan</b></td>
    <td><b>Jumlah</b></td>
    <td><b>Harga Satuan</b></td>
    <td><b>Jumlah Harga</b></td>
</tr>

<!-- DATA 1 -->
<tr>
    <td align="left"><?php echo $brg1; ?></td>
    <td align="right"><?php echo $jmlbrg1; ?></td>
    <td align="right"><?php echo $harga1; ?></td>
    <td align="right"><?php echo $th1; ?></td>
</tr>

<!-- DATA 2 -->
<tr>
    <td align="left"><?php echo $brg2; ?></td>
    <td align="right"><?php echo $jmlbrg2; ?></td>
    <td align="right"><?php echo $harga2; ?></td>
    <td align="right"><?php echo $th2; ?></td>
</tr>

<!-- DATA 3 -->
<tr>
    <td align="left"><?php echo $brg3; ?></td>
    <td align="right"><?php echo $jmlbrg3; ?></td>
    <td align="right"><?php echo $harga3; ?></td>
    <td align="right"><?php echo $th3; ?></td>
</tr>

<!-- DATA 4 -->
<tr>
    <td align="left"><?php echo $brg4; ?></td>
    <td align="right"><?php echo $jmlbrg4; ?></td>
    <td align="right"><?php echo $harga4; ?></td>
    <td align="right"><?php echo $th4; ?></td>
</tr>

<!-- TOTAL -->
<tr>
    <td colspan="3" align="right">Total Harga</td>
    <td align="right"><?php echo $tharga; ?></td>
</tr>

<!-- DISKON -->
<tr>
    <td colspan="3" align="right">
        Diskon (<?php echo $diskon; ?>%)
    </td>
    <td align="right"><?php echo $tdiskon; ?></td>
</tr>

<!-- TOTAL BAYAR -->
<tr>
    <td colspan="3" align="right"><b>Jumlah harus dibayar</b></td>
    <td align="right"><b><?php echo $tdibayar; ?></b></td>
</tr>

</table>

</center>
</body>
</html>