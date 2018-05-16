<?php

include 'dbConnect.php';
$dbConn = getDatabaseConnection();

$sql = "SELECT *
        FROM receiving
        WHERE 1";
        
$statement = $dbConn->query($sql);
$result = $statement -> fetchAll();

//$result = $statement->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);

?>