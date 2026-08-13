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

        l
        <style>
            table { border-collapse: collapse; width: 60%; margin: 20px 0; background-color: #D8FFC5; }
            th, td { border: 1px solid #ccc; padding: 8px 10px; text-align:left; }
            th { background-color: #30AFFF; }
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
            <th>kelas</th>
            <th>alamat</th>
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
                <td><?=$siswa['alamat']; ?> </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
    </table>
</body>
</html>