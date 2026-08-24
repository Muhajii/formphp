<?php

// Hubungkan ke database
include 'koneksi.php';

// Periksa apakah parameter ID dikirimkan melalui URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID data tidak ditemukan!");
}

$id = $_GET['id'];

// Siapkan query DELETE menggunakan Prepared Statement
$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM siswa WHERE id = ?"
);

// Periksa apakah Prepared Statement berhasil dibuat
if (!$stmt) {
    die("Gagal menyiapkan query: " . mysqli_error($koneksi));
}

// Hubungkan parameter ID ke query
mysqli_stmt_bind_param($stmt, "i", $id);

// Jalankan query
if (mysqli_stmt_execute($stmt)) {

    // Jika berhasil, arahkan kembali ke halaman index
    header("Location: dbupdatedandelete.php?pesan=berhasil_hapus");
    exit;

} else {

    echo "Gagal menghapus data: " . mysqli_stmt_error($stmt);
}

// Tutup statement
mysqli_stmt_close($stmt);

?>