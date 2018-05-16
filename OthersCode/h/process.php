<?php
session_start();
include 'dbConnect.php';
$dbConn = getDatabaseConnection();

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * 
        FROM users
        WHERE username = '$username'
        AND password = '$password'";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

if(empty($record)){
    echo "<h1> Incorrect Login Information!</h1>";
}
else{
    $_SESSION['username '] = $record['username'];
    $_SESSION['adminFullName'] = $record['fName'] . " " . $record['lName'];
    header('Location: administration.php'); 
}




?>
