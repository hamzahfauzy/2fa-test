<?php

require 'vendor/autoload.php';

$tfa = new RobThree\Auth\TwoFactorAuth(new RobThree\Auth\Providers\Qr\QRServerProvider());

$users = json_decode(file_get_contents('users.json'), true);

$email = 'user@example.com';
$secret = $tfa->createSecret();
$qrCode = $tfa->getQRCodeImageAsDataUri($email, $secret);

$users[$email]['secret'] = $secret;
file_put_contents('users.json', json_encode($users));

echo "<h2>Scan QR Code</h2>";
echo "<img src='$qrCode'>";
echo "<p>Secret: $secret</p>";
