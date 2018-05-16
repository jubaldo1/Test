<!DOCTYPE html>
<html>
    <head>
        <title>Download a File/Image</title>
    </head>
    <body>
        <!-- Had to create a form input an ID for the image -->
        <form method="get">
            Enter File ID: <input type="text" name="fileId"/>
            <input type="submit" value="Submit"/>
        </form>
        
        <?php
             include 'DBConnection.php';
            
             echo "File ID : " . $_GET['fileId'] . "<br>";
            
             $dbConn = getDBConn("images");
            
             $sql = "SELECT * FROM up_files WHERE fileId = :fileId"; 
             $stmt = $dbConn->prepare($sql);
             $stmt->execute( array(":fileId"=> $_GET['fileId']));
            
             $stmt->bindColumn('fileData', $data, PDO::PARAM_LOB);
             $record = $stmt->fetch(PDO::FETCH_BOUND);
             
             echo "Did this run?";
             if (!empty($record)){
                header('Content-Type:' . $record['fileType']);   //specifies the mime type
                header('Content-Disposition: inline;');
                echo "<br>Data: <br>";
                echo $data; 
                
                $result = imagecreatefromstring($data);
                echo imagejpeg($result, 'test.jpg');
              } 
              
                 
        ?>
    </body>
</html>