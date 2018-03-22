<?php
session_start();
if (isset($_SESSION['username'])) {
  header('location: Index.php');
}
require_once('Config.php');
?>

<title>ASK</title>

<div align='center'>
    <div class="ask-page">
        <div class="form">
            <form class="question-form" action="Process_Ask.php" method="post">
                <textarea id="question" placeholder="write question.." name="question" style="height:200px"></textarea><br>
                <button>send</button>
            </form>
        </div>
    </div>
</div>
