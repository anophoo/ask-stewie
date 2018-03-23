<?php
/**
 * Created by PhpStorm.
 * User: anophoo
 * Date: 3/23/18
 * Time: 01:53
 */
session_start();
include_once 'Config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
</head>
<?php
if ( $_SESSION['logged_in'] ) {
// if admin is logged in
?>
<body>
    <div align="center">
        <?php
        $sql = "SELECT * FROM questions;";
        $result = mysqli_query($mysqli, $sql);
        $resultCheck = mysqli_num_rows($result);
        $idArray = array();
        $questionArray = array();
        $answerArray = array();
        // these arrays will always have equal size
        // one multidimensional array would be great but let it be for now
        if ($resultCheck > 0) {
            // we have results
            // then make for each html. set id and don't forget to POST
            while ($row = mysqli_fetch_assoc($result)) {
                $idArray[] = $row['id'];
                $questionArray[] = $row['question'];
                $answerArray[] = $row['answer'];
            }
        } else {
            // there is no questions
            echo "no questions yet";
        }
        ?>
        <h2>Hey, Stewie...</h2>
        <?php for($idx = 0; $idx < sizeof($questionArray); $idx++): ?>
            <p><?php echo $questionArray[$idx]; ?><br></p>
            <form class="answer-form" action="../processes/ProcessAnswer.php" method="post">
                <textarea placeholder="write answer.." name="answer" style="height:60px"><?php echo $answerArray[$idx]?></textarea><br>
                <input type="hidden" value="<?php echo $idArray[$idx]?>" name="question_id" />
                <button  title="change answer" name="answerBtn">Change Answer</button>
            </form>
            <form class="delete-form" action="../processes/ProcessDelete.php" method="post">
                <input type="hidden" value="<?php echo $idArray[$idx]?>" name="question_id" />
                <button title="delete question" name="questionBtn>">Delete Question</button>
            </form>
        <?php endfor; ?>
    </div>
    <div align="center">
        <br><br><br>
        <form action="../processes/ProcessLogout.php" method="post">
            <button type="submit" title="logout" name="logout" >LOG OUT, STEWIE</button>
        </form>
    </div>
</body>
<?php
} else {
    // casual user case
    ?>
    <body>
    <div align="center">
        <?php
        $sql = "SELECT * FROM questions;";
        $result = mysqli_query($mysqli, $sql);
        $resultCheck = mysqli_num_rows($result);
        $idArray = array();
        $questionArray = array();
        $answerArray = array();
        // these arrays will always have equal size
        // one multidimensional array would be great but let it be for now
        if ($resultCheck > 0) {
            // we have results
            // then make for each html. set id and don't forget to POST
            while ($row = mysqli_fetch_assoc($result)) {
                $idArray[] = $row['id'];
                $questionArray[] = $row['question'];
                $answerArray[] = $row['answer'];
            }
        } else {
            // there is no questions
            echo "no questions yet";
        }
        ?>
        <h2>Hey, Normal User...</h2>
        <?php for($idx = 0; $idx < sizeof($questionArray); $idx++): ?>
            <p class="question"><?php echo $questionArray[$idx]; ?><br></p>
            <p class="answer"><?php echo $answerArray[$idx]; ?><br></p>
        <?php endfor; ?>
    </div>
    <div align="center">
        <br><br><br>
        <form action="Index.php">
            <button>GO BACK</button>
        </form>
    </div>
    </body>


    <?php
}
?>
</html>
