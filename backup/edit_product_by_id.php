<?php
    include_once('db.php');

    $sql = "UPDATE product SET p_name=? , p_price=?, p_detail=?
            WHERE p_id =?";
    
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssss", $name,$price,$detail,$id);
    $name = $_GET['p_name'];
    $price= $_GET['p_price'];
    $detail = $_GET['p_detail'];
    $id= $_GET['p_id'];
    
    $stmt->execute();

    // ปิดการเชื่อมต่อฐานข้อมูล
    $stmt->close();
    $conn->close();
    
    // ไปยังไฟล์ showproduct.php
    header( "location: showproduct.php" );
    exit(0);
?>