<?php
session_start();
require_once('../Config.php');
$_SESSION['logged_in'] = false;
?>
<html>
<head>
    <title>ASK STEWIE</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<div align="center">
    <div class="index-page">
        <div class="form">
            <h1 id="h01">Ask Stewie Anything<br></h1>
            <img width="180px" src="https://goo.gl/DkVrzS" alt="Stewie is looking at you"><br><br><br>
            <form action="Ask.php">
                <button>ASK</button>
            </form>
            <form action="AdminLoginPage.php">
                <button>I AM STEWIE</button>
            </form>
            <form action="AllQuestions.php" method="post">
                <button>SEE ALL QUESTIONS</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
