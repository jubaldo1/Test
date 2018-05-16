<?php 
    // start a session to pass data between everything
    session_start();
    include "DBConnection.php";
    $conn = getDataBaseconnection("kahoot");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create a Kahoot: Start</title>
    </head>
    <body>
        <form method="post" action="overview.php">
            Title (required):<br>
            <input type="text" name="title" value="<?php echo $_SESSION['title']; ?>"><br><br>
            Description (required):<br>
            <input type="text" name="describe" value="<?php echo $_SESSION['describe']; ?>"><br><br>
            <input type="submit" name="submit" value="Ok, go"><br>
        
            <!-- get the form submission -->
            <?php
                // if the title is set, get the title
                if (isset($_POST['title']))
                {
                    $_SESSION['title'] = $_POST['title'];
                    $title = $_POST['title'];
                    echo "Title retrieved.";
                }
                else
                { echo "Title NOT retrieved."; }
                
                // if the desciption is filled, get the description
                if (isset($_POST['describe']))
                {
                    $_SESSION['describe'] = $_POST['describe'];
                    $describe = $_POST['describe'];
                    echo "Description retrieved.";
                }
                else
                { echo "Description NOT retrieved."; }
                
                
               /*$sql = " SELECT * FROM Recipe
                LEFT JOIN Author ON Recipe.author_id=Author.author_id"; 
                */
                
                //$sql = "INSERT INTO `quizzes` (quiz_title,quiz_pin,host_id)
                //        VALUES ('$title', 241, 100)";
                        
                //$stmt = $conn -> prepare ($sql);
                //$stmt -> execute ();
                // gets the recor
                //$records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            ?>
        </form>
    </body>
</html>