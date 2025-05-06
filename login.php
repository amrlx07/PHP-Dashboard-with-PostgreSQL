<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = pg_query($conn, $query);
    $user = pg_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) { // Verifikasi password
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        echo "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
	<script src="script.js"></script>
</head>
<body>
	<div class="container">
		<h2>Login</h2>
		<form method="post" action="login.php">
		<div class="input-container">
		<input type="text" name="username" placeholder="Username" required>
	</div>
	<div class="input-container password-container">
		<input type="password" id="password" name="password" placeholder="Password" required>
		<img id="show-password" src="eye-icon.png" width="20px" onclick="togglePasswordVisibility()">
	</div>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Registrasi di sini</a></p>
	</div>
</body>
</html>