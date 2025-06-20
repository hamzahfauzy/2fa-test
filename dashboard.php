<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}
?>

<h1>Selamat Datang!</h1>
<p>Anda berhasil login dengan Google Authenticator</p>
<a href="logout.php">Logout</a>
