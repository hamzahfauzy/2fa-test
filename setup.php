<?php

require 'vendor/autoload.php';

$tfa = new RobThree\Auth\TwoFactorAuth(new RobThree\Auth\Providers\Qr\QRServerProvider());

$email = 'user@example.com';
$secret = $tfa->createSecret();
$qrCode = $tfa->getQRCodeImageAsDataUri($email, $secret);

echo "<h2>Scan QR Code</h2>";
echo "<img src='$qrCode'>";
echo "<p>Secret: $secret</p>";
