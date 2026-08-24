<?php
session_start();
require_once 'koneksi.php';

$error = '';

if (isset($_POST['tombol_login'])) {

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Cari data pengguna berdasarkan username
    $result = mysqli_query(
        $koneksi,
        "SELECT * FROM users WHERE username = '$username'"
    );

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row['password'])) {

            // Simpan data pengguna ke dalam session
            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
            $_SESSION['role'] = $row['role'];

            // Arahkan ke dashboard
            header("Location: dashboard.php");
            exit;

        } else {
            $error = "Password yang Anda masukkan salah!";
        }

    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>

<body>

    <h2>Silakan Masuk (Login)</h2>

    <?php if ($error != ''): ?>
        <p style="color: red;">
            <?= $error; ?>
        </p>
    <?php endif; ?>

    <form action="" method="POST">

        <div>
            <label for="username">Username:</label><br>
            <input
                type="text"
                id="username"
                name="username"
                required
            >
        </div>

        <br>

        <div>
            <label for="password">Password:</label><br>
            <input
                type="password"
                id="password"
                name="password"
                required
            >
        </div>

        <br>

        <button type="submit" name="tombol_login">
            Masuk
        </button>

    </form>

    <br>

    <p>
        Belum punya akun?
        <a href="register.php">Daftar di sini</a>
    </p>

</body>

</html>