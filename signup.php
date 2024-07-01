<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST">
            <?php include('errors.php'); ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password1" placeholder="Password" required>
            <input type="password" name="password2" placeholder="Confirm Password" required>
            <div class="terms">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the <a href="t.html">terms and conditions</a></label>
            </div>
            <button type="submit" name="reg_user">Sign Up</button>
        </form>
        <div class="extra-options">
            <button type="button" class="social-button google">Sign up with Google</button>
            <button type="button" class="social-button facebook">Sign up with Facebook</button>
        </div>
        <div class="login">
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
    </div>
</body>
</html>