<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users = json_decode(file_get_contents('users.json'), true);

    if (isset($users[$email]) && password_verify($password, $users[$email]['password'])) {
        $_SESSION['email'] = $email;
        header('Location: verify.php');
        exit;
    } else {
        echo "Email atau password salah";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
