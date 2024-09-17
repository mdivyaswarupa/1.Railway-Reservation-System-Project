<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['pswd'];

    // Perform your database validation here (replace with your logic)
    // Example validation: Check if the username and password match a database record
    $validUser = true; 

    if ($validUser) {
        // Set session variables
        $_SESSION['username'] = $username;

        // Redirect to the home page
        header("Location: home.html");
        exit();
    } else {
        // Redirect back to the login page with an error message
        header("Location: login.html?error=1");
        exit();
    }
}
?>

