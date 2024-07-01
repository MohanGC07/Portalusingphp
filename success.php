<?php
session_start();

if (!isset($_SESSION['success'])) {
    header('location: index.php');
    exit();
}

$success_message = $_SESSION['success'];
unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="success-container">
        <h2><?php echo $success_message; ?></h2>
        <a href="index.php">Go to Home</a>
    </div>
</body>
</html>