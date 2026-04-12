<html>
<head>
<title>Contoh Penggunaan IF</title>
</head>
<body>
<form method="get">
    Besar Pembelian :
    <input type="text" name="total_beli"><br>
    <input type="submit" value="Tentukan Diskon">
</form>

<?php
if (isset($_GET['total_beli'])) {
    $total_beli = intval($_GET['total_beli']);
    $diskon = 0;

    if ($total_beli >= 200000) {
        $diskon = 0.1;
    } elseif ($total_beli >= 100000) {
        $diskon = 0.05;
    } else {
        $diskon = 0.01;
    }

    $diskon_nominal = $diskon * $total_beli;
    $pembayaran = $total_beli - $diskon_nominal;

    printf("Diskon = %s <br>\n", $diskon_nominal);
    printf("Pembayaran = %s <br>\n", $pembayaran);
}
?>
</body>
</html>