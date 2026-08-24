<?php

// Koneksi ke database
include 'koneksi.php';

// Mengambil seluruh data siswa
$query = mysqli_query($koneksi, "SELECT * FROM siswa");

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa - CRUD PHP</title>

    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .btn {
            padding: 4px 8px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 13px;
        }

        .btn-edit {
            background-color: #ffc107;
            color: #000;
        }

        .btn-hapus {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-tambah {
            background-color: #28a745;
            color: #fff;
            padding: 6px 12px;
        }
    </style>
</head>

<body>

    <h2>Daftar Siswa</h2>

    <a href="form.php" class="btn btn-tambah">
        + Tambah Siswa Baru
    </a>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>email</th>
                <th>kelas</th>
                <th>alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $no = 1;

            while ($siswa = mysqli_fetch_assoc($query)):
            ?>

                <tr>
                    <td><?= $no++; ?></td>

                     <td>
                        <?= htmlspecialchars($siswa['id']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($siswa['nama']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($siswa['email']); ?> 
                    </td>
                    <td>
                        <?= htmlspecialchars($siswa['kelas']); ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($siswa['alamat']); ?>
                    </td>

                    <td>

                        <!-- Link Edit membawa parameter ID -->
                        <a
                            href="edit.php?id=<?= $siswa['id']; ?>"
                            class="btn btn-edit"
                        >
                            Edit
                        </a>

                        <!-- Link Hapus membawa parameter ID -->
                        <a
                            href="hapus.php?id=<?= $siswa['id']; ?>"
                            class="btn btn-hapus"
                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                        >
                            Hapus
                        </a>

                    </td>
                </tr>

            <?php endwhile; ?>

        </tbody>

    </table>

</body>

</html>