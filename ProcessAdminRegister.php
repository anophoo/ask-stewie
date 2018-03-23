<?php
session_start();
require_once("Config.php");

/* Registration process, inserts user info into the database
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['username'] = $_POST['username'];

// Escape all $_POST variables to protect against SQL injections
$username = $mysqli->escape_string($_POST['username']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM admins WHERE username='$username'");
echo "num rows: " . $result->num_rows;

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    $_SESSION['message'] = 'User with this username already exists!';
    header("location: ../../application/controller/error.php");
} else { // Email doesn't already exist in a database, proceed...
    echo $_SESSION['message'];

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO admins (username, password, hash) "
        . "VALUES ('$username', '$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){
        header("location: AllQuestions.php");
    } else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: Error.php");
    }

}