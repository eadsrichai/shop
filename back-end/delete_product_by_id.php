<?php
    include_once('db.php');
    $sql = "DELETE FROM  product WHERE p_id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $p_id);
    $p_id = $_GET['p_id'];

    $stmt->execute();

    $stmt->close();
    $conn->close();
    header( "location: showproduct.php" );
    exit(0);
?>