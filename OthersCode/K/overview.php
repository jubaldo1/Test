<?php 
    session_start();
    include "DBConnection.php";
    $conn = getDataBaseconnection("kahoot");
    
    $title = $_POST['title'];
    $describe = $_POST['describe'];
    
    $sql = "INSERT INTO `quizzes` (quiz_title,quiz_pin,host_id)
                        VALUES ('$title', 241, 100)";
                        
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute ();

    // assign the post info to session
    $_SESSION['title'] = $title;
    $_SESSION['describe'] = $describe;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create a Kahoot: Overview</title>
    </head>
    <body>
        <h1>Create a Kahoot: Overview</h1>
        <?php 
            echo "Title: " . $_SESSION['title'] . "<br>";
            echo "Description: " . $describe . "<br>";
            echo '<a href="index.php" title="Edit your kahoot description">Edit</a>';
            
            // horizontal line
            echo "<br><hr><br>";
        ?>
        
        <h3>Game Creator</h3><br>
        
        <?php
            //$_SESSION['numOfQuestions'];
            
            echo '<a href="addQuestion.php">Add question</a>';
        ?>
        
        
        
    </body>
    <?php 
    ?>
</html>