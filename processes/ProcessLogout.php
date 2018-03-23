<?php
/**
 * Created by PhpStorm.
 * User: anophoo
 * Date: 3/23/18
 * Time: 16:10
 */
require 'Config.php';
session_start();

$_SESSION['logged_in'] = false;
header("location: Index.php");