<?php
    //include "../dbConn.php";
    //session_start();
    ///if (isset($_POST['answers']))
    //{
    //    $_SESSION['answers'] = $_POST['answers'];
    //}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Poll</title>
        <script src="js/all.js"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        Do Stuff:<br>
        <script>
            doStuff();
        </script>
        
        <form method="post">
            <input type = "radio" class="answers" value="yes"> YES
            <input type = "radio" class="answers" value="no"> NO <br>
            <input type = button name="SUBMIT" id="input">
        </form>
        
    </body>
</html>