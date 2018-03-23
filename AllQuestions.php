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
    <title>Questions</title>
</head>
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
        <h2>I am Stewie</h2>
        <table>
            <?php for($idx = 0; $idx < sizeof($questionArray); $idx++): ?>
                <tr>
                    <td>Question: <br><?php echo $questionArray[$idx]; ?><br></td>
                    <td><textarea id="<?php $idArray[$idx]?>" placeholder="write answer.." name="answer" style="height:60px"><?php echo $answerArray[$idx]?></textarea></td>
                    <td><button title="change answer" name="answer" id="<?php $idArray[$idx]?>">Change Answer</button> </td>
                    <td><button title="delete question" name="delete" id="<?php $idArray[$idx]?>">Delete Question</button> </td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</body>
</html>