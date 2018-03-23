<?php
session_start();
require_once('../Config.php');

$_SESSION['username'] = $_POST['username'];

// Escape username to protect against SQL injections
if (!empty($mysqli)) {
    $username = $mysqli->escape_string($_POST['username']);
}
$result = $mysqli->query("SELECT * FROM admins WHERE username='$username'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that name doesn't exist!";
    header("location: ../view/AdminLoginPage.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {

        $_SESSION['username'] = $user['username'];

        // This is how we'll know the admin is logged in
        $_SESSION['logged_in'] = true;

        header("location: ../view/AllQuestions.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: ../view/AdminLoginPage.php");
    }
}

