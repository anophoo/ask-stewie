<?php
session_start();
if (isset($_SESSION['username'])) {
  header('location: index.php');
}
require_once('config.php');
?>

<title>ASK</title>

<div align='center'>
    <div class="ask-page">
        <div class="form">
            <form class="feedback-form" action="../controller/feedback_page.php" method="post">
                <textarea id="feedback" placeholder="write feedback.." name="feedback" style="height:200px"></textarea><br>
                <button>send</button>
            </form>
        </div>
    </div>
</div>
