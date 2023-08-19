<?php
    $u = $_GET['username'];
    $p = $_GET['password'];


    include_once('db.php');

    $sql = "SELECT username, password 
            FROM   account
            WHERE  username = '$u'  
            AND    password = '$p'
            ";
    
     $result = $conn->query($sql);
    
    
     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION["username"] = $u;
            $_SESSION["password"] = $p;
    
            echo "username and password ถูกต้อง";
            header( "location: showproduct.php" );
            exit(0);
         }
    }else {
            header( "location: index.php" );
            exit(0);
    }
?>