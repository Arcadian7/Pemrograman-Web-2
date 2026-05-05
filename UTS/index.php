<?php
session_start();

if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = [];
}

/* ===== FUNCTION PARSE KODE ===== */
function parseKode($kode) {
    $awal = strtoupper(substr($kode, 0, 1));

    if ($awal == 'A') $gedung = "Gedung A";
    elseif ($awal == 'B') $gedung = "Gedung B";
    elseif ($awal == 'V') $gedung = "Gedung Viktor";
    else $gedung = "-";

    $akhir = substr($kode, -2);
    $bulanList = [
        "1"=>"Jan","2"=>"Feb","3"=>"Mar","4"=>"Apr",
        "5"=>"Mei","6"=>"Jun","7"=>"Jul","8"=>"Agu",
        "9"=>"Sep","10"=>"Okt","11"=>"Nov","12"=>"Des"
    ];

    $bulan = isset($bulanList[(int)$akhir]) ? $bulanList[(int)$akhir] : "-";

    return [$gedung, $bulan];
}

/* ===== PROSES SIMPAN ===== */
if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $ortu = $_POST['ortu'];

    $mat = $_POST['mat'];
    $ing = $_POST['ing'];
    $umum = $_POST['umum'];

    $gedung_kode = $_POST['gedung_kode'];
    $gelombang = $_POST['gelombang'];
    $bulan = $_POST['bulan'];

    // AUTO NOMOR
    $no = count($_SESSION['data']) + 1;
    $no_format = str_pad($no, 3, "0", STR_PAD_LEFT);

    // GENERATE KODE
    $kode = $gedung_kode . $gelombang . "-" . $no_format . "-" . $bulan;

    // PARSE
    list($gedung, $bulan_nama) = parseKode($kode);

    // HITUNG RATA-RATA
    $rata = ($mat + $ing + $umum) / 3;

    // KETERANGAN
    if ($rata >= 70) $ket = "Lulus";
    elseif ($rata >= 60) $ket = "Cadangan";
    else $ket = "Tidak Lulus";

    $_SESSION['data'][] = [
        'kode'=>$kode,
        'nama'=>$nama,
        'jk'=>$jk,
        'tempat'=>$tempat,
        'tanggal'=>$tanggal,
        'asal'=>$asal,
        'ortu'=>$ortu,
        'mat'=>$mat,
        'ing'=>$ing,
        'umum'=>$umum,
        'rata'=>$rata,
        'ket'=>$ket,
        'gedung'=>$gedung,
        'bulan'=>$bulan_nama
    ];
}

/* ===== HITUNG TOTAL ===== */
$total = count($_SESSION['data']);
$lulus = 0;
$tidak = 0;

foreach ($_SESSION['data'] as $d) {
    if ($d['ket']=="Lulus") $lulus++;
    if ($d['ket']=="Tidak Lulus") $tidak++;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pendaftaran Mahasiswa</title>

<style>
body { font-family: Arial; font-size: 12px; }
.wrapper { width: 820px; margin:auto; }

.label { display:inline-block; width:160px; }
.row { margin-bottom:4px; }

input, select { width:180px; height:20px; font-size:12px; }
.radio { width:auto; }

button { font-size:12px; padding:2px 10px; }

table { width:100%; border-collapse:collapse; margin-top:15px; }
table, th, td { border:1px solid black; }
th, td { padding:3px; text-align:center; font-size:11px; }

.bottom { display:flex; justify-content:space-between; margin-top:20px; }
.box { width:48%; border:1px solid black; padding:10px; }

.lulus { background:#c8f7c5; }
.tidak { background:#f7c5c5; }
</style>

</head>
<body>

<div class="wrapper">

<h3>INPUT PENDAFTARAN</h3>

<form method="POST">

<div class="row">
<span class="label">Nama</span>
<input type="text" name="nama" required>
</div>

<div class="row">
<span class="label">Jenis Kelamin</span>
<input type="radio" class="radio" name="jk" value="Laki-laki"> L
<input type="radio" class="radio" name="jk" value="Perempuan"> P
</div>

<div class="row">
<span class="label">TTL</span>
<div class="row">
<span class="label">Tempat Lahir</span>
<input type="text" name="tempat">
</div>

<div class="row">
<span class="label">Tanggal Lahir</span>
<input type="date" name="tanggal">
</div>

<div class="row">
<span class="label">Asal Sekolah</span>
<input type="text" name="asal">
</div>

<div class="row">
<span class="label">Pekerjaan Ortu</span>
<select name="ortu">
<option value="">-- Pilih --</option>
<option>PNS</option>
<option>Wiraswasta</option>
<option>Karyawan</option>
<option>Petani</option>
</select>
</div>

<div class="row">
<span class="label">Gedung</span>
<select name="gedung_kode">
<option value="A">Gedung A</option>
<option value="B">Gedung B</option>
<option value="V">Gedung Viktor</option>
</select>
</div>

<div class="row">
<span class="label">Gelombang</span>
<select name="gelombang">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
</select>
</div>

<div class="row">
<span class="label">Bulan Tes</span>
<select name="bulan">
<option value="1">Jan</option>
<option value="2">Feb</option>
<option value="3">Mar</option>
<option value="4">Apr</option>
<option value="5">Mei</option>
<option value="6">Jun</option>
<option value="7">Jul</option>
<option value="8">Agu</option>
<option value="9">Sep</option>
<option value="10">Okt</option>
<option value="11">Nov</option>
<option value="12">Des</option>
</select>
</div>

<div class="row"><b>Nilai Tes</b></div>

<div class="row">
<span class="label">Matematika</span>
<input type="number" name="mat">
</div>

<div class="row">
<span class="label">B. Inggris</span>
<input type="number" name="ing">
</div>

<div class="row">
<span class="label">Pengetahuan Umum</span>
<input type="number" name="umum">
</div>

<div class="row">
<button type="submit" name="simpan">Simpan</button>
<button type="reset">Reset</button>
</div>

</form>

<h3>TABEL DATA</h3>

<table>
<tr>
<th>Kode</th>
<th>Nama</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Gedung</th>
<th>Bulan</th>
<th>JK</th>
<th>Asal</th>
<th>MAT</th>
<th>ING</th>
<th>UMUM</th>
<th>Rata</th>
<th>Ket</th>
</tr>

<?php foreach($_SESSION['data'] as $d): 
$class = ($d['ket']=="Lulus") ? "lulus" : (($d['ket']=="Tidak Lulus")?"tidak":"");
?>
<tr class="<?= $class ?>">
<td><?= $d['kode'] ?></td>
<td><?= $d['nama'] ?></td>
<td><?= $d['tempat'] ?></td>
<td><?= $d['tanggal'] ?></td>
<td><?= $d['gedung'] ?></td>
<td><?= $d['bulan'] ?></td>
<td><?= $d['jk'] ?></td>
<td><?= $d['asal'] ?></td>
<td><?= $d['mat'] ?></td>
<td><?= $d['ing'] ?></td>
<td><?= $d['umum'] ?></td>
<td><?= number_format($d['rata'],2) ?></td>
<td><?= $d['ket'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<br>
Total: <?= $total ?> |
Lulus: <?= $lulus ?> |
Tidak Lulus: <?= $tidak ?>

<div class="bottom">
<div class="box">
<b>Kode:</b><br>
A = Gedung A<br>
B = Gedung B<br>
V = Viktor<br>
Format: A1-001-9
</div>

<div class="box">
<b>Keterangan:</b><br>
≥ 70 = Lulus<br>
60–69 = Cadangan<br>
< 60 = Tidak Lulus
</div>
</div>

</div>

</body>
</html>