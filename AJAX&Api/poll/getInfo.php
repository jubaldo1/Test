<?php 
    // SWEET LAWD don't put this code within html code,
    // it BREAKS the json code

    include "../dbConn.php";

    // php to run to get the information
    // connection to the database
    $dbConn = getDBConn('poll');
    $sql = "SELECT * FROM dogs";
    
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute();
    
    // records
    $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    
    //echo "Data from DB: " . json_encode($records);
    echo json_encode($records);
?>