<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $loggedIn = true;
    $username = $_SESSION['username'];
} else {
    $loggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="bg-light py-3">
        <div class="main container d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="images/logo.png" alt="Logo" class="img-fluid">
            </div>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="#">Browse Opportunities</a></li>
                    <li class="nav-item"><a class="nav-link" href="post_opportunity.php">Post an Opportunity</a></li>
                    <?php if ($loggedIn) : ?>
                        <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="signup.php">SignUp</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <?php if ($loggedIn) : ?>
            <div class="container mt-2">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="edit_profile.php">Edit Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="upload_profile_pic.php">Upload Profile Picture</a></li>
                    <li class="nav-item"><a class="nav-link" href="followers.php">Check Followers</a></li>
                    <li class="nav-item"><a class="nav-link" href="delete_account.php">Delete Account</a></li>
                </ul>
            </div>
        <?php endif; ?>
        <div class="container mt-3">
            <form class="d-flex" action="search.php" method="get">
                <input class="form-control me-2" type="search" name="query" placeholder="Search opportunities..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </header>
    <main>
        <section class="hero bg-primary text-white text-center py-5">
            <div class="container containers">
                <h1>Explore New Opportunities!</h1>
                <p>Or, <a href="post_opportunity.php" class="text-white">post an opportunity</a> for free.</p>
                <form class="search-form d-flex justify-content-center mt-4" action="search.php" method="get">
                    <select class="form-select me-2" name="opportunity">
                        <option value="any">Any Opportunity</option>
                        <option value="seminar">Seminar</option>
                        <option value="fellowship">Fellowship</option>
                        <option value="internship">Internship</option>
                        <option value="full-time">Full-time Job</option>
                        <option value="part-time">Part-time Job</option>
                        <option value="workshop">Workshop</option>
                        <!-- Add more options as needed -->
                    </select>
                    <select class="form-select me-2" name="region">
                        <option value="any">Any Region</option>
                        <option value="bagmati">Bagmati</option>
                        <option value="gandaki">Gandaki</option>
                        <option value="lumbini">Lumbini</option>
                        <option value="karnali">Karnali</option>
                        <option value="sudurpaschim">Sudurpaschim</option>
                        <!-- Add more options for other regions of Nepal as needed -->
                    </select>
                    <button class="btn btn-light" type="submit">Explore</button>
                </form>
            </div>
        </section>
        <section class="opportunities py-5">
            <div class="container">
                <h2 class="text-center mb-4">Deadline Approaching</h2>
                <div id="opportunities-container" class="row g-4"></div>
            </div>
        </section>
    </main>
    <footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="mb-3">Follow Us</h5>
                <div class="d-flex">
                    <a href="#" class="me-3"><img src="images/twitter.png" alt="Twitter" class="img-fluid social-icon"></a>
                    <a href="#" class="me-3"><img src="images/fb.png" alt="Facebook" class="img-fluid social-icon"></a>
                    <a href="#" class="me-3"><img src="images/linkedin.png" alt="LinkedIn" class="img-fluid social-icon"></a>
                    <a href="#" class="me-3"><img src="images/instagram.png" alt="Instagram" class="img-fluid social-icon"></a>
                    <a href="#"><img src="images/youtube.png" alt="YouTube" class="img-fluid social-icon"></a>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="mb-3">Quick Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">Youth Opportunities</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">Partners</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">Join</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">Local Networks</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">Press</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">Promote Program</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3">About Us</h5>
                <p class="text-white-50">Youth Opportunities is the largest opportunities discovery platform for youth across Nepal.</p>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="text-white-50">&copy; 2024 Job Portal. All rights reserved.</p>
        </div>
    </div>
</footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    
    
</body>
</html>
