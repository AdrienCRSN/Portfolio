<?php

    require_once 'pdoconfig.php';
    
    try{
        $conn = mysqli_connect($servername, $username, $password, $database);
        echo "Connected successfully";
    }catch(PDOException $pe){
        die("Could not connect to the database" . $pe->getMessage());
    }
    
?>