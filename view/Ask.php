<?php
session_start();
require_once('../Config.php');
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>ASK</title>
</head>
<body>
    <div align='center'>
        <div class="ask-page">
            <div class="form">
                <h1 id="h01">Go ahead, ask...</h1>
                <form class="question-form" action="../processes/ProcessAsk.php" method="post">
                    <br><img width="180px" src="https://goo.gl/4RQbqJ" alt="Stewie is looking at you"><br><br><br>
                    <textarea id="ta" placeholder="write question.." name="question" style="height:90px"></textarea><br><br>
                    <button>SEND</button>
                </form>
                <form action="../view/Index.php">
                    <button>GO BACK</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
