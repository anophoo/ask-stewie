<?php
/**
 * Created by PhpStorm.
 * User: anophoo
 * Date: 3/23/18
 * Time: 00:50
 */

require_once('../Config.php');
session_start();


// Set session variables
$_SESSION['question'] = $_POST['question'];

// Escape all $_POST variables to protect against SQL injections
$question = $mysqli->escape_string($_POST['question']);

// create sql command
$sql = "INSERT INTO questions (question)"
    . " VALUES ('$question')";

// Add question to the database
if ( $mysqli->query($sql) ){
    header("location: ../view/Index.php");
} else {
    $_SESSION['message'] = 'Registration failed!';
    header("location: ../view/Error.php");
}

