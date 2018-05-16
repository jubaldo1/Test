<?php
include "../dbConn.php";
$dbConn = getDBConn('poll');
$answer = $_POST['answer'];
session_start();

    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    switch($httpMethod) {
      case "OPTIONS":
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        exit();
      case "GET":
        $sql = "SELECT * FROM `dogs`";
        
        $statement = $dbConn->query($sql);
        $result = $statement -> fetchAll();

        echo json_encode($result);
        break;
      case "POST":
        // TODO: do stuff to get the $results which is an associative array
        //$results = array();
        echo "<br>POST: Entered insertInfo.php<br>";
    
     /*   if (isset($answer))
        {*/
            echo "Entered isset";
            if ($answer  == "yes")
            {
                echo "Answer was YES.<br>";
                $sql = "UPDATE `dogs` SET `yes` = `yes` + 1";
                $stmt = $dbConn->prepare($sql);
                $stmt -> exec($sql);
            }
            else
            {
                echo "no idea what happened";
                $sql = "UPDATE `dogs` SET `no` = `no` + 1";
                $stmt = $dbConn -> prepare ($sql);
                $stmt -> exec($sql);
            }
        //}
        
        // Allow any client to access
        /*header("Access-Control-Allow-Origin: *");
        
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");
        */
        // Sending back down as JSON
        echo json_encode($results);

        break;
    }
?>