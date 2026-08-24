<?php

// Memulai session agar PHP mengenali sesi yang sedang aktif
session_start();

// Mengosongkan seluruh data session
$_SESSION = [];

// Menghapus seluruh variabel session
session_unset();

// Menghancurkan session di server
session_destroy();

// Arahkan pengguna kembali ke halaman login
header("Location: login.php?pesan=logout_berhasil");
exit;

?>