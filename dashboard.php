<?php

// WAJIB diletakkan di baris paling atas sebelum tag HTML apa pun
session_start();

// Pengecekan status login (Gatekeeper)
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    // Jika belum login, arahkan kembali ke halaman login
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utama</title>
</head>

<body>

    <h1>
        Selamat Datang,
        <?= htmlspecialchars($_SESSION['nama_lengkap']); ?>!
    </h1>

    <p>
        Status Hak Akses (Role):
        <strong>
            <?= htmlspecialchars($_SESSION['role']); ?>
        </strong>
    </p>

    <hr>

    <h3>Menu Navigasi Aplikasi:</h3>

    <ul>
        <li>
            <a href="dbupdatedandelete.php">
                Kelola Data Siswa (CRUD)
            </a>
        </li>

        <li>
            <a href="form.php">
                Tambah Data Siswa
            </a>
        </li>

        <li>
            <a
                href="logout.php"
                onclick="return confirm('Yakin ingin keluar?');"
            >
                Keluar (Logout)
            </a>
        </li>
    </ul>

    <hr>

    <p>
        <em>
            Halaman ini aman dan hanya dapat diakses setelah berhasil
            melewati proses login.
        </em>
    </p>

</body>

</html>