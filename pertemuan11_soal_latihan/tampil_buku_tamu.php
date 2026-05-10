<?php
$conn = mysqli_connect("localhost", "root", "", "buku_tamu");

// Tentukan halaman aktif
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; // 5 record per halaman
$offset = ($page - 1) * $limit;

// Hitung total record
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM guestbook");
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Ambil data sesuai halaman
$query = "SELECT * FROM guestbook ORDER BY tanggal DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);
?>

<html>
<head>
    <title>Buku Tamu</title>
    <style>
        .pagination { margin-top: 20px; }
        .pagination a { margin: 0 5px; text-decoration: none; padding: 5px 10px; background: #eee; border-radius: 3px; }
        .pagination a.active { background: #007bff; color: white; }
    </style>
</head>
<body>
    <h2>Daftar Buku Tamu</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>No</th><th>Nama</th><th>Email</th><th>Pesan</th><th>Tanggal</th></tr>
        <?php
        $no = $offset + 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['pesan']}</td>
                    <td>{$row['tanggal']}</td>
                  </tr>";
            $no++;
        }
        ?>
    </table>

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page-1 ?>">« Prev</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i ?>" <?= ($i == $page) ? 'class="active"' : '' ?>><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?= $page+1 ?>">Next »</a>
        <?php endif; ?>
    </div>

    <br>
    <a href="form_buku_tamu.php">Kembali ke Form Buku Tamu</a>
</body>
</html>
<?php mysqli_close($conn); ?>