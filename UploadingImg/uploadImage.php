<?php 
    /*
    *   This program uploads a file, specifically an image.
    */
    include "DBConnection.php";
   // include "downloadFile.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Uploading an Image</title>
    </head>
    <body>
    
        <?php
            
            function createThumbnail(){
                $sourcefile = imagecreatefromstring(file_get_contents($_FILES["fileName"]["tmp_name"]));
                $newx = 150; $newy = 150;  //new size
                $thumb = imagecreatetruecolor($newx,$newy);
                imagecopyresampled($thumb, $sourcefile, 0,0, 0,0, $newx, $newy,     
                imagesx($sourcefile), imagesy($sourcefile)); 
                imagejpeg($thumb,"thumb.jpg"); //creates jpg image file called "thumb.jpg"
                echo "<img src='thumb.jpg'/>";
            }
            
            function createImage(){
                $sourcefile = imagecreatefromstring(file_get_contents($_FILES["fileName"]["tmp_name"]));
                $newx = imagesx($sourcefile); $newy = imagesy($sourcefile);  //new size
                $thumb = imagecreatetruecolor($newx,$newy);
                imagecopyresampled($thumb, $sourcefile, 0,0, 0,0, $newx, $newy,     
                imagesx($sourcefile), imagesy($sourcefile)); 
                imagejpeg($thumb,"full.jpg"); //creates jpg image file called "thumb.jpg"
                echo "<img src='full.jpg'/>";
            }
            
            function filterUploadedFile() {
                $allowedTypes = array("text/plain","image/png",
                                      "image/jpg", "image/jpeg", "image/gif");
                $allowedExtensions = array("txt", "png", "jpg", "jpeg", "gif");
                $allowedSize = 10000;
                $filterError = "";
                
                // check file types
                if (!in_array($_FILES["fileName"]["type"], $allowedTypes))
                {
                    $filterError = "Invalid type. <br>";
                }
                
                // check file name
                $filename = $_FILES["fileName"]["name"];
                if (!in_array(substr($filename, strpos($filename, ".") + 1), $allowedExtensions))
                {
                    $filterError = "Ivalid extension. <br>";
                }
                
                if (($_FILES["fileName"]["size"]/1024) > $allowedSize)
                {
                    $filterError = "File size is too big.<br>";
                }
                
                return $filterError;
            }
        
            if (isset($_POST['uploadForm'])) {
                // function for filtering files
                $filterError = filterUploadedFile();
                
                if (empty($filterError))
                {
                    if ($_FILES["fileName"]["error"] > 0) {
                        echo "Error: " . $_FILES["fileName"]["error"] . "<br>";
                    }
                    else {
                        echo "Upload: " . $_FILES["fileName"]["name"] . "<br>";
                        echo "Type: " . $_FILES["fileName"]["type"] . "<br>";
                        echo "Size: " . ($_FILES["fileName"]["size"] / 1024) . " KB<br>";
                        echo "Stored in: " . $_FILES["fileName"]["tmp_name"];
                    
                        // Database connection time/SQL
                        // need binary data
                        $binaryData = file_get_contents($_FILES["fileName"]["tmp_name"]);
                        
                        // connection, SQL statement
                        $conn = getDBConn("images");
                        
                        $sql = "INSERT INTO `up_files` (fileName, fileType, fileData)
                                VALUES (:fileName, :fileType, :fileData)";
                    
                        $stmt = $conn -> prepare($sql);
                        $stmt -> execute(array(":fileName"=>$_FILES["fileName"]["name"],
                                               ":fileType"=>$_FILES["fileName"]["type"],
                                               ":fileData"=>$binaryData));
                        echo "<br />File saved into database. <br /><br />";
                    }
                } //end empty($filterError)
                else
                {
                    echo $filterError;
                }
            } //endIf form submission
            
            createThumbnail();
            createImage();
        ?>
        
        <form method="POST" enctype="multipart/form-data"> 
            Select file: <input type="file" name="fileName" /> <br />
            <input type="submit"  name="uploadForm" value="Upload File" /> 
        </form>
    </body>
</html>