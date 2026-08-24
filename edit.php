<?php

// Hubungkan dengan file koneksi
include 'koneksi.php';

// Periksa apakah parameter ID tersedia di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID siswa tidak ditemukan!");
}

$id = $_GET['id'];

// Ambil data siswa berdasarkan ID
$query = mysqli_query(
    $koneksi,
    "SELECT * FROM siswa WHERE id = '$id'"
);

$siswa = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan di database
if (!$siswa) {
    die("Data siswa dengan ID $id tidak ditemukan di database!");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Siswa</title>

    <style>
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 300px;
            padding: 8px;
        }

        .btn-simpan {
            background-color: #28a745;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
        }

        .btn-kembali {
            background-color: #6c757d;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>

<body>

    <h2>Edit Data Siswa</h2>

    <a href="index.php" class="btn-kembali">
        ← Kembali ke Daftar Siswa
    </a>

    <br><br>

    <form action="proses_edit.php" method="POST">

        <!-- Input hidden untuk menyimpan ID siswa -->
        <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars($siswa['id']); ?>"
        >

        <div class="form-group">

            <label for="nama">
                Nama Siswa:
            </label>

            <input
                type="text"
                id="nama"
                name="nama"
                value="<?= htmlspecialchars($siswa['nama']); ?>"
                required
            >

        </div>

        <div class="form-group">

            <label for="email">
                Email:
            </label>

            <input
                type="text"
                id="email"
                name="email"
                value="<?= htmlspecialchars($siswa['email']); ?>"
                required
            >

        </div>

            <div class="form-group">

            <label for="kelas">
                Kelas:
            </label>

            <input
                type="text"
                id="kelas"
                name="kelas"
                value="<?= htmlspecialchars($siswa['kelas']); ?>"
                required
            >

        </div>

            <div class="form-group">

            <label for="alamat">
                Alamat:
            </label>

            <input
                type="text"
                id="alamat"
                name="alamat"
                value="<?= htmlspecialchars($siswa['alamat']); ?>"
                required
            >

        </div>

        

        <button type="submit" class="btn-simpan">
            Simpan Perubahan
        </button>

    </form>

</body>

</html>