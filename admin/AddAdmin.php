<?php
/**
 * Created by PhpStorm.
 * User: anophoo
 * Date: 3/23/18
 * Time: 16:57
 */

// temporary file to add admins manually, as we don't have admin registration on web page

session_start();
require_once('../Config.php');

$usernameToAdd = "stewie";
$passwordToAdd = "wee";

$username = $mysqli->escape_string($usernameToAdd);
$password = $mysqli->escape_string(password_hash($passwordToAdd, PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

$sql = "INSERT INTO admins (username, password, hash) "
    . "VALUES ('$username', '$password', '$hash')";

// Add user to the database
if ( $mysqli->query($sql) ){
    echo "added successfully";
} else {
    echo "naah";
}