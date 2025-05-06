<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Periksa apakah username sudah ada
    $query_check = "SELECT * FROM users WHERE username = '$username'";
    $result_check = pg_query($conn, $query_check);

    if (pg_num_rows($result_check) > 0) {
        echo "Username sudah terdaftar! Silakan gunakan yang lain.";
    } else {
        // Simpan ke database
        $query_insert = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $result_insert = pg_query($conn, $query_insert);

        if ($result_insert) {
            echo "Registrasi berhasil! Silakan login.";
            header("Location: login.php");
            exit();
        } else {
            echo "Terjadi kesalahan dalam registrasi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>
<body>

<div class="container">
    <h2>Registrasi</h2>
    <form method="post" action="register.php">
        <div class="input-container">
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-container password-container">
            <input type="password" id="password" name="password" placeholder="Password" required>
            <img id="show-password" src="eye-icon.png" width="20px" onclick="togglePasswordVisibility()">
        </div>
        <button type="submit">Login</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>

</body>
</html>