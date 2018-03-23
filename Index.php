<?php
session_start();
require_once('Config.php');
?>

<div align="center">
    <div class="index-page">
        <div class="form">
            <h1><br>Ask Stewie Anything<br></h1>
            <img width="180px" src="https://goo.gl/DkVrzS" alt="Stewie is looking at you"><br><br><br>
            <form action="Ask.php">
                <button>ASK</button>
            </form>
            <form action="AdminLoginPage.php">
                <button>I AM STEWIE</button>
            </form>
            <form action="ProcessAllQuestions.php" method="post">
                <button>SEE ALL QUESTIONS</button>
            </form>
        </div>
    </div>
</div>