<?php
session_start();
if (isset($_SESSION['role'])) {
    header("Location: index.php");
    exit();
}

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'password') {
        $_SESSION['role'] = 'admin';
        header("Location: index.php");
        exit();
    } elseif ($username === 'teacher' && $password === 'password') {
        $_SESSION['role'] = 'teacher';
        header("Location: index.php");
        exit();
    } elseif ($username === 'student' && $password === 'password') {
        $_SESSION['role'] = 'student';
        header("Location: index.php");
        exit();
    } else {
        $error = 'Invalid credentials! Try admin/password';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login - Student Management</title>
<link rel="stylesheet" href="style.php">
<meta charset='utf-8'>
<style>
    body { display: flex; justify-content: center; align-items: center; height: 100vh; background: linear-gradient(135deg, #0f1115 0%, #181a20 100%); }
    .login-wrapper {
        background: rgba(30, 33, 40, 0.65);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 24px;
        padding: 50px;
        text-align: center;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
        width: 100%;
        max-width: 400px;
    }
    .login-wrapper h2 { margin-bottom: 20px; color: #10b981; }
    .login-wrapper input[type="text"], .login-wrapper input[type="password"] {
        width: 100%; padding: 14px 20px; margin-bottom: 20px;
        background: rgba(15, 17, 21, 0.8); border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px; color: #f3f4f6; outline: none;
    }
    .login-wrapper input[type="text"]:focus, .login-wrapper input[type="password"]:focus {
        border-color: #10b981;
    }
    .login-wrapper input[type="submit"] {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #ffffff; padding: 15px; border: none; border-radius: 12px;
        font-weight: 600; cursor: pointer; width: 100%; text-transform: uppercase;
    }
    .login-wrapper .error { color: #ef4444; margin-bottom: 15px; font-weight: 500; }
</style>
</head>
<body>
<div class="login-wrapper">
    <h2>System Login</h2>
    <?php if ($error) echo "<div class='error'>$error</div>"; ?>
    <form method="post" action="login.php">
        <input type="text" name="username" placeholder="Username (admin, teacher, student)" required>
        <input type="password" name="password" placeholder="Password (password)" required>
        <input type="submit" value="Login">
    </form>
    <p style="margin-top:20px; font-size: 0.85em; color: #9ca3af;">Use admin/password, teacher/password, or student/password to login.</p>
</div>
</body>
</html>
