<?php
    include 'header.php';
    include 'dbConnect.php';
    $dbConn = getDatabaseConnection();
    
    if(isset($_POST['add']) ){
        global $dbConn;    
        
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $un = $_POST['newUser'];
        $pw = sha1($_POST['newPass']);
        
        if ($fName == "" || $lName == "" || $un == "" || $pw == ""){
            echo "<h1>Please fill out all criteria while adding a new user.<h1>";   
        }
        else{
            if ($dbConn->connect_error) {
                die("Connection failed: " . $dbConn->connect_error);
            }
        
            $sql = "INSERT INTO users (fName, lName, username, password)
                    VALUES('$fName', '$lName', '$un', '$pw')";
                

            if ($dbConn->query($sql) == TRUE) {
                echo "New record created successfully";
            } 
            else {
                echo "Error: " . $sql . "<br>" . $dbConn->error;
            }
        }
    }
    
    if (isset($_POST['back'])){
        header("Location: administration.php");
        exit;
    }
?>
    
    <fieldset>
        <legend> Add New User </legend>
        
        <form method="POST">
            First Name: <input type="text" name="fName" /><br>
            Last Name: <input type="text" name="lName" /><br>
            Username: <input type="text" name="newUser" value="" /><br>
            Password: <input type="password" name="newPass" value="" /><br>
            <input type="submit" value="Add User" name="add" /><br />
            <input type="submit" value="Back" name="back" />
        </form>
    </fieldset>
<?php

include 'footer.php';

?>