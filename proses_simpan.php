<?php

include "koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO siswa (nama, email, kelas, alamat)

VALUES ('$nama', '$email', '$kelas', '$alamat')";

mysqli_query($koneksi, $sql);
echo "Data berhasil disimpan.";




echo '<a href="mysqlifetchcontohrapih.php">Lihat database</a>';







?>