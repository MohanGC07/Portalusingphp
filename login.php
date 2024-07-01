<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <?php include('errors.php'); ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="extra-options">
                <div>
                    <input type="checkbox" id="remember-me" name="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <a href="forgotpassword.php">Forgot Password?</a>
            </div>
            <button type="submit" name="login_user">Login</button>
        </form>
        <div class="register">
            <p>Don't have an account? <a href="signup.php">Register</a></p>
        </div>
    </div>
</body>
</html>