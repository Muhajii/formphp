<?php
// 1. Membuat koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'dbsiswabaru');

// 2. Memeriksa koneksi
if (!$koneksi) {
die("Koneksi gagal: " . mysqli_connect_error());
}

//3. Menyiapkan dan menjalankan perintah SQL
$sql = "SELECT * FROM siswa";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
        <meta charset="UTF-8">
        <title>Daftar Siswa</title>

        <style>
            table { border-collapse: collapse; width: 60%; margin: 20px 0; }
            th, td { border: 1px solid #ccc; padding: 8px 12px; text-align:left; }
            th { background-color: #f2f2f2; }
        </style>

</head>
<body>

    <h2>Daftar Siswa Sekolah</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>email</th>
            <th>kelas<th>
        </tr>
    </thead>
    <tbody>

        <?php
        $no = 1; // Variabel penomoran tampilan
        while ($siswa = mysqli_fetch_assoc($query)) :
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $siswa['id']; ?></td>
                <td><?= $siswa['nama']; ?></td>
                <td><?= $siswa['email']; ?> </td>
                <td><?= $siswa['kelas']; ?> </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
    </table>
</body>
</html>