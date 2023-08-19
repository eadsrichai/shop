<?php
   session_start();

   if(isset($_SESSION['username']) && $_SESSION['username'] != null && isset($_SESSION['password']) && $_SESSION['password'] != null){
        echo "ยินดีต้อนรับคุณ ". $_SESSION['username'] ;
   }else {
        header( "location: index.php" );
        exit(0);
   }
    echo '<br><a href="delsession.php" class="btn btn-sm btn-outline-secconday">Logout</a>';
?>
