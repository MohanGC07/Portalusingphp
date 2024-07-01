<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $loggedIn = true;
    $username = $_SESSION['username'];
} else {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Browse Opportunities</a></li>
                <li><a href="post_opportunity.php">Post an Opportunity</a></li>
                <?php if ($loggedIn) : ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">SignUp</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php if ($loggedIn) : ?>
            <div class="profile-actions">
                <ul>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </div>
        <?php endif; ?>
        <div class="search-header">
            <form action="search.php" method="get">
                <input type="text" name="query" placeholder="Search opportunities...">
                <button type="submit">Search</button>
            </form>
        </div>
    </header>
    <main>
        <section class="hero">
            <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
            <p>Explore new opportunities or post an opportunity for free.</p>
            <form class="search-form" action="search.php" method="get">
                <select name="opportunity">
                    <option value="any">Any Opportunity</option>
                </select>
                <select name="region">
                    <option value="any">Any Region</option>
                </select>
                <button type="submit">Explore</button>
            </form>
        </section>
        <section class="opportunities">
            <h2>Deadline Approaching</h2>
            <div id="opportunities-container"></div>
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <div class="social-media">
                <a href="#"><img src="images/twitter.png" alt="Twitter"></a>
                <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="images/linkedin.png" alt="LinkedIn"></a>
                <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
                <a href="#"><img src="images/youtube.png" alt="YouTube"></a>
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="#">Youth Opportunities</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Partners</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><