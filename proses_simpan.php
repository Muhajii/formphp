<?php

include "koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$kelas = $_POST['kelas'];

$sql = "INSERT INTO siswa (nama, email, kelas)

VALUES ('$nama', '$email', '$kelas')";

mysqli_query($koneksi, $sql);
echo "Data berhasil disimpan.";

<a href="mysqlifetchcontohrapih.php" target="_blank">lihat tabel disini</a>



?>