<?php
include 'koneksi.php';

// Cek apakah ID ada di URL dan valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("id tidak valid! Pastikan parameter id ada di URL dan valid.");
}

// Query menggunakan prepared statement
$stmt = mysqli_prepare($conn, "SELECT * FROM transaksi WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}

// Ambil data hasil query
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan!");
}

// Sertakan file tampilan form
include 'yayah.php';
?>
