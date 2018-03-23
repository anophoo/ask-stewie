<?php
session_start();
require_once('Config.php');
?>

<title>ASK</title>

<div align='center'>
    <div class="ask-page">
        <div class="form">
            <h1><br>Go ahead, ask...</h1>
            <form class="question-form" action="ProcessAsk.php" method="post">
                <br><img width="180px" src="https://goo.gl/4RQbqJ" alt="Stewie is looking at you"><br><br><br>
                <textarea id="question" placeholder="write question.." name="question" style="height:90px"></textarea><br><br>
                <button>SEND</button>
            </form>
            <form action="Index.php">
                <button>GO BACK</button>
            </form>
        </div>
    </div>
</div>
