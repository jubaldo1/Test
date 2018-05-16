<?php 
    //session_start();
    // SWEET LAWD don't put this code within html code,
    // it BREAKS the json code

    include "../dbConn.php";
    
    $answer = $_POST['answers'];
    
    // php to run to get the information
    // connection to the database
    
    $dbConn = getDBConn('poll');
    
    echo "Entered insertInfo.php<br>";
    
    //if (isset($_POST['answers']))
    //{
    //    echo "Entered isset";
        if ($_SESSION['answers']  == "yes")
        {
            echo "Answer was YES.<br>";
            //$sql = "SELECT * FROM dogs WHERE '$answer'='yes'";
            // $sql = "UPDATE dogs SET yes ";
            $sql = "UPDATE `dogs` SET `yes` = `yes` + 1";
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute();
            session_unset();
        }
        else if ($_SESSION['answers'] == "no")
        {
            echo "no idea what happened";
            //$sql = "SELECT * FROM dogs WHERE '$answer'='no'";
            
            $sql = "UPDATE `dogs` SET `no` = `no` + 1";
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute();
            session_unset();
        }
   // }
    
    // records
    //$records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    
    //echo json_encode($records);
    
    
    
?>