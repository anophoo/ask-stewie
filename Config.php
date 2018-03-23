<?php
/**
 * Created by PhpStorm.
 * User: anophoo
 * Date: 3/23/18
 * Time: 00:44
 */

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'stewie');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');

$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die($mysqli->error);