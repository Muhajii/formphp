<?php
require_once 'koneksi.php';

// Variabel pesan
$pesan = '';

if (isset($_POST['tombol_register'])) {

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $password = $_POST['password'];

    // Validasi input tidak boleh kosong
    if (empty($username) || empty($password) || empty($nama_lengkap)) {

        $pesan = "Semua kolom wajib diisi!";

    } else {

        // Cek apakah username sudah pernah digunakan
        $cek_user = mysqli_query(
            $koneksi,
            "SELECT * FROM users WHERE username = '$username'"
        );

        if (mysqli_num_rows($cek_user) > 0) {

            $pesan = "Username sudah terdaftar, gunakan username lain!";

        } else {

            // Enkripsi password sebelum disimpan
            $password_aman = password_hash($password, PASSWORD_DEFAULT);

            // Simpan ke database
            $query = "INSERT INTO users (username, password, nama_lengkap)
                      VALUES ('$username', '$password_aman', '$nama_lengkap')";

            if (mysqli_query($koneksi, $query)) {

                $pesan = "Registrasi berhasil! Silakan 
                          <a href='login.php'>Login</a>";

            } else {

                $pesan = "Gagal mendaftar: " . mysqli_error($koneksi);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru</title>
</head>

<body>

    <h2>Form Registrasi Pengguna</h2>

    <?php if ($pesan != ''): ?>
        <p style="color: blue;">
            <?= $pesan; ?>
        </p>
    <?php endif; ?>

    <form action="" method="POST">

        <div>
            <label>Nama Lengkap:</label><br>
            <input type="text" name="nama_lengkap" required>
        </div>

        <br>

        <div>
            <label>Username:</label><br>
            <input type="text" name="username" required>
        </div>

        <br>

        <div>
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </div>

        <br>

        <button type="submit" name="tombol_register">
            Daftar Akun
        </button>

    </form>

    <br>

    <p>
        Sudah punya akun?
        <a href="login.php">Login di sini</a>
    </p>

</body>

</html>