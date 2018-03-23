<?php
/**
 * Created by PhpStorm.
 * User: anophoo
 * Date: 3/23/18
 * Time: 14:53
 */
require 'Config.php';
session_start();


// Escape all $_POST variables to protect against SQL injections
$question_id = $mysqli->escape_string($_POST['question_id']);

// create sql command
$sql = "DELETE FROM questions" . " WHERE id = ('$question_id')";

// Add question to the database
if ( $mysqli->query($sql) ){
    // successful delete
    header("location: AllQuestions.php");
} else {
    // delete failed
    $_SESSION['message'] = 'Delete failed!';
    header("location: Error.php");
}