<?php
/**
 * Created by PhpStorm.
 * User: anophoo
 * Date: 3/23/18
 * Time: 01:53
 */

include_once 'Config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>"Questions"</title>
</head>
<body>
    <div align="center">

        <?php
        $sql = "SELECT * FROM questions;";
        $result = mysqli_query($mysqli, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            // we have results
            // create multi array of questions and answers
            // then make for each html. set id and don't forget to POST
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['question']."<br>";
                echo $row['answer']."<br>";
            }
        } else {
            // there is no questions
            echo "no questions yet";
        }
        ?>
    </div>
</body>
</html>
