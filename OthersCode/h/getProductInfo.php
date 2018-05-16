<?php
    include 'dbConnect.php';
    $dbConn = getDatabaseConnection();    
    $sql = "SELECT *,
            FROM receiving 
            WHERE receiverId = :id";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute(array("id"=>$_GET['receiverId']));
    $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
?>