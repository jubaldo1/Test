<?php

include 'header.php';
include 'dbConnect.php';
session_start();

if(!isset($_SESSION['username '])){ 
    header("Location: login.php"); 
    exit;
}

function displayUsers(){
    
    $dbConn = getDatabaseConnection();
    $sql = "SELECT *
            FROM users
            ORDER BY userId";
        
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    return $users;
}

function countUsers(){

    $dbConn = getDatabaseConnection();
    $sql = 'SELECT COUNT(userID) AS amount
            FROM users';
    
    $statement = $dbConn->query($sql);
    $statement -> execute();
    $data = $statement->fetch();
    $count = $data['amount'];
    
    echo "<strong> You have a total of " . $count . " users.</strong>";
};

function countReceived(){

    $dbConn = getDatabaseConnection();
    $sql = 'SELECT COUNT(receiverId) AS amount
            FROM receiving';
    
    $statement = $dbConn->query($sql);
    $statement -> execute();
    $data = $statement->fetch();
    $count = $data['amount'];
    
    echo "<strong> You have a total of " . $count . " products received.</strong>";
};

function countProducts(){

    $dbConn = getDatabaseConnection();
    $sql = 'SELECT COUNT(productId) AS amount
            FROM products';
    
    $statement = $dbConn->query($sql);
    $statement -> execute();
    $data = $statement->fetch();
    $count = $data['amount'];
    
    echo "<strong> You have a total of " . $count . " types of products.</strong>";
};

// function countProducts(){

//     $dbConn = getDatabaseConnection();
//     $sql = "SELECT COUNT(*)
//             FROM products";
        
//     $stmt = $dbConn->prepare($sql);
//     $stmt->execute();
//     $products = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
//     //return $users;
    
//     echo "<strong> You have a total of: " . $products . " products.</strong>";
// };

// function countReceived(){
    
//     $dbConn = getDatabaseConnection();
//     $sql = "SELECT COUNT(*)
//             FROM receiving";
        
//     $stmt = $dbConn->prepare($sql);
//     $stmt->execute();
//     $recs = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
//     //return $users;
    
//     echo "<strong> You have a total of: " . $recs . " received.</strong>";
// };
?>

<script>

    function confirmDelete() {
        
        return confirm("Are you sure you want to delete this author?");
        
    }            
    
</script>
<body>
    <h1> Administration Page</h1>
    <h2> Welcome <?=$_SESSION[adminFullName]?>! </h2>
    
    <br >
    <form action ="addUser.php">
        <input type="submit" value="Add User" />
    </form>
    
    <form action= "index.php">
        <input type="submit" value="Logout"/>
    </form>
    
    <br /><br />
    <?php
    $users = displayUsers();
    echo "<table align='center' class='table table-bordered'>";
    echo "<tbody>";
    echo "<tr>";
    echo "<th> User ID </th>";
    echo "<th> Name </th>";
   // echo "<th> Last Name </th>";
    echo "<th> Edit User </th>";
    echo "<th> Delete User</th>";
    echo "</tr>";
    foreach($users as $user){
        echo "<tr>";
        echo "<td>" . $user['userId'] . "</td>";
        echo "<td><a href='userInfo.php?userId=".$user['userId']."'>".$user['fName'] . " " . $user['lName']."</td>";
        if($user['userId'] == 1){
            echo "<td><strong>N/A</strong></td>";
            echo "<td><strong>N/A</strong></td>";
        }
        else{
            echo "<td>[<a href='updateUser.php?userId=".$user['userId']."'>Edit</a>] </td>";
            echo "<td><form style='display:inline' action='deleteUser.php' onsubmit='return confirmDelete()'>
                        <input type='hidden' name='userId' value='".$user['userId']."'>
                        <input type='submit' value='Delete'>
                      </form> </td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    
    countUsers();
    echo "<br>";
    countProducts();
    echo "<br>";
    countReceived();
    echo "<br>";
    
    
    include 'footer.php';
    ?>