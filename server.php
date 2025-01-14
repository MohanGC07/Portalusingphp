<?php

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$success = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'jobportal');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);

    if ($result === false) {
        array_push($errors, "Database query failed: " . mysqli_error($db));
    } else {
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }

            if ($user['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); // encrypt the password before saving in the database

        $query = "INSERT INTO users (username, email, password) 
                  VALUES('$username', '$email', '$password')";
        if (mysqli_query($db, $query)) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You have successfully signed up!";
            echo '<script>alert("Sign up successful!"); window.location.href = "index.php";</script>';
        } else {
            array_push($errors, "Failed to register user: " . mysqli_error($db));
        }
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password); // encrypt the password
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);

        if ($results === false) {
            array_push($errors, "Database query failed: " . mysqli_error($db));
        } elseif (mysqli_num_rows($results) == 1) {
            // Fetch the user details
            $user = mysqli_fetch_assoc($results);
            $_SESSION['username'] = $user['username']; // Set username in session
            $_SESSION['success'] = "You have successfully logged in!";
            echo '<script>alert("Login successful!"); window.location.href = "index.php";</script>';
        } else {
            array_push($errors, "Wrong email/password combination");
        }
    }
}
?>