<?php
include 'header.php';
session_start();

if (!isset($_SESSION['username '])) { //checks whether admin has already logged in
    
    header("Location: login.php");
    exit;
    
}

include 'dbConnect.php';
$dbConn = getDatabaseConnection();

$sql = "DELETE FROM users WHERE userId = " . $_GET['userId'];

//echo $sql;

$stmt = $dbConn->prepare($sql);
$stmt->execute();

header('Location: administration.php');

include 'footer.php';

?>