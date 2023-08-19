<?php
    $u = $_GET['username'];
    $p = $_GET['password'];

    // echo "username ". $u . "<br>";
    // echo "password ". $p;

    include_once('../db.php');

    $sql = "SELECT  acc_username, acc_password 
            FROM  account
            WHERE  acc_username = '$u'  
            AND    acc_password = '$p'
            ";
    
     $result = $conn->query($sql);
    
    
     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION["username"] = $u;
            $_SESSION["password"] = $p;
    
            echo "username and password ถูกต้อง";
            header( "location: showstudent.php" );
            exit(0);
         }
    }else {
            header( "location: index.php" );
            exit(0);
    }
?>