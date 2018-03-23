<?php
session_start();
require_once("../Config.php");

// currently not using

/* Registration process, inserts admin info into the database
 */

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
    header("location: ../view/Error.php");
} else { // Email doesn't already exist in a database, proceed...
    echo $_SESSION['message'];

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO admins (username, password, hash) "
        . "VALUES ('$username', '$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){
        header("location: ../view/AllQuestions.php");
    } else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: ../view/Error.php");
    }

}