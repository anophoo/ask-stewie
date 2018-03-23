<?php
/**
 * Created by PhpStorm.
 * User: anophoo
 * Date: 3/23/18
 * Time: 14:53
 */
require '../Config.php';
session_start();

// Escape all $_POST variables to protect against SQL injections
$question_id = $mysqli->escape_string($_POST['question_id']);
$answer_text = $mysqli->escape_string($_POST['answer']);

// create sql command
$sql = "UPDATE questions SET answer = ('$answer_text') WHERE id = ('$question_id')";

// update answer in the database
if ( $mysqli->query($sql) ){
    // successful update
    header("location: ../view/AllQuestions.php");
} else {
    // update failed
    $_SESSION['message'] = 'Update failed!';
    header("location: ../view/Error.php");
}