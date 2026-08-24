<?php

// Sertakan file koneksi database
include 'koneksi.php';

// Pastikan file hanya diakses melalui method POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Akses ditolak! Formulir harus dikirim melalui method POST.");
}

// Tangkap data yang dikirim dari form edit
$id = $_POST['id'] ?? '';
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$kelas = trim($_POST['kelas'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');

// Validasi sederhana: pastikan tidak ada data yang kosong
if (empty($id) || empty($nama) || empty($email) || empty($kelas) || empty($alamat)) {
    die("Semua bidang formulir wajib diisi!");
}

// Menyiapkan query UPDATE
$sql = "UPDATE siswa SET nama = '$nama', email = '$email', kelas = '$kelas', alamat = '$alamat' WHERE id = '$id'";

// Menjalankan query
if (mysqli_query($koneksi, $sql)) {

    // Jika berhasil diubah, arahkan kembali ke halaman daftar siswa
    header("Location: dbupdatedandelete.php?pesan=berhasil_update");
    exit;

} else {

    echo "Gagal memperbarui data: " . mysqli_error($koneksi);

}

?>