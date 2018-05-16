<?php
include 'header.php';
session_start();

if(!isset($_SESSION['username '])){
    header("Location: login.php");
    exit;
}

include 'dbConnect.php';
$dbConn = getDatabaseConnection();

function getUserInfo(){
    global $dbConn;
    
    $sql = "SELECT *
            FROM users
            WHERE userId = " . $_GET['userId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    return $record;
}

if (isset($_GET['editForm'])){
    $sql = "UPDATE users SET
                fName = :fName,
                lName = :lName
            WHERE userId = :userId";
            
    $namedParameters = array();
    $namedParameters[':fName'] = $_GET['fName'];
    $namedParameters[':lName'] = $_GET['lName'];
    $namedParameters[':userId'] = $_GET['userId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    echo "Record was updated!";
}

if(isset($_GET['userId'])){
    $userInfo = getUserInfo();
}

if (isset($_GET['back'])){
        header("Location: administration.php");
        exit;
    }

?>


        <h1> Updating User's Info </h1>
        
        <fieldset>
            
            <legend> Updating User </legend>
            
            <form>
                
                
                 <input type="hidden" name="userId" value="<?=$userInfo['userId']?>">
                 
                First Name: <input type="text" name="fName" value="<?=$userInfo['fName']?>" /> <br />
                Last Name: <input type="text" name="lName" value="<?=$userInfo['lName']?>"/> <br />
                <input type="submit" value="Update User" name="editForm"> </br>
                 <input type="submit" value="Back" name="back" />
            </form>
            
        </fieldset>
        
<?php

include 'footer.php';

?>