<?php 
    session_start();
    include "DBConnection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo '<title>Create a Kahoot: Question</title>'; ?>
    </head>
    <body>
        <form method="post">
            Question (required):<br><input type="text" name="question_title" value="<?php echo $_POST['']; ?>"><br><br>
            Answer 1 (required):<br><input type="text" name="answer1" value="<?php echo $_POST['answer1']; ?>"><br><br>
            Answer 2 (required):<br><input type="text" name="answer2" value="<?php echo $_POST['answer2']; ?>"><br><br>
            Answer 3:<br><input type="text" name="answer3" value="<?php echo $_POST['answer3']; ?>"><br><br>
            Answer 4:<br><input type="text" name="answer4" value="<?php echo $_POST['answer4']; ?>"><br><br>
            <input type="submit" name="submit" value="Next">
            <?php 
                if (!isset($_POST['question_title']))
                { echo "You MUST enter a question.<br>"; }
                else
                { $qTitle = $_POST['question_title']; }
                
                if (!isset($_POST['answer1']) || !isset($_POST['answer2']))
                { echo "You MUST enter an answer for both Answer 1 and Answer 2.<br>"; }
                else
                {
                    $_SESSION['answer1'] = $_POST['answer1'];
                    $_SESSION['answer2'] = $_POST['answer2'];
                    
                    if (isset($_POST['answer3']))
                    { $_SESSION['answer3'] = $_POST['answer3']; }
                    if (isset($_POST['answer4']))
                    { $_SESSION['answer4'] = $_POST['answer4']; }
                }
            ?>
        </form>
    </body>
</html>