<?php
session_start();
require 'vendor/autoload.php';
use RobThree\Auth\TwoFactorAuth;

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

$email = $_SESSION['email'];
$users = json_decode(file_get_contents('users.json'), true);
$secret = $users[$email]['secret'];

$tfa = new TwoFactorAuth('ContohApp');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];

    var_dump($secret);
    var_dump($code);
    var_dump($tfa->verifyCode($secret, $code));
    die;

    if ($tfa->verifyCode($secret, $code)) {
        $_SESSION['logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Kode OTP salah!";
    }
}
?>

<h2>Masukkan Kode Google Authenticator</h2>
<form method="POST">
    OTP: <input type="text" name="code" required><br>
    <button type="submit">Verifikasi</button>
</form>
