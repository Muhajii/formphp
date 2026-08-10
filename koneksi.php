<?php
$koneksi = mysqli_connect("localhost","root","","dbsiswabaru");

if ($koneksi) {
    echo "Koneksi Berhasil ";
} else {
    echo "Koneksi Gagal ";
}

?>