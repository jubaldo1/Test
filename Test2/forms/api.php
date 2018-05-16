<?php
  session_start();
  include "../dbConn.php";
  $dbConn = getDBConn('poll');
  $answer = $_POST['answer'];

    echo "Entered apiEndpoint";

    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    switch($httpMethod) {
      case "OPTIONS":
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        exit();
      case "GET":
        echo "<br>GET: Entered insertInfo.php<br>";
        echo "GET in apiEndpoint<br>";
        
        // Allow any client to access
        //header("Access-Control-Allow-Origin: *");
        
        // Let the client know the format of the data being returned
        //header("Content-Type: application/json");

        // php to run to get the information
        // connection to the database
        $sql = "SELECT * FROM `dogs`";
    
        $stmt = $dbConn->query($sql);
       // $stmt -> execute();
    
        // records
        $records = $stmt -> fetchAll();
    
        echo json_encode($records);
    
        // TODO: do stuff to get the $results which is an associative array
        break;
      case 'POST':
        // Get the body json that was sent
        $answer = $_POST['answer'];
        
        // TODO: do stuff to get the $results which is an associative array
        //$results = array();
        echo "<br>POST: Entered insertInfo.php<br>";
    
        if (isset($answer))
        {
            echo "Entered isset";
            if ($answer  == "yes")
            {
                echo "Answer was YES.<br>";
                //$sql = "SELECT * FROM dogs WHERE '$answer'='yes'";
                // $sql = "UPDATE dogs SET yes ";
                $sql = "UPDATE `dogs` SET `yes` = `yes` + 1";
                $stmt = $dbConn -> prepare ($sql);
                $stmt -> execute();
                session_unset();
            }
            else if ($answer == "no")
            {
                echo "no idea what happened";
                //$sql = "SELECT * FROM dogs WHERE '$answer'='no'";
                
                $sql = "UPDATE `dogs` SET `no` = `no` + 1";
                $stmt = $dbConn -> prepare ($sql);
                $stmt -> execute();
                session_unset();
            }
        }
        
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");

        // Sending back down as JSON
        echo json_encode($results);

        break;
      case 'PUT':
        // TODO: Access-Control-Allow-Origin
        http_response_code(401);
        echo "Not Supported";
        break;
      case 'DELETE':
        // TODO: Access-Control-Allow-Origin
        http_response_code(401);
        break;
    }
?>