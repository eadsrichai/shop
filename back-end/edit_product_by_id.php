<?php
    include_once('db.php');

    $sql = "UPDATE product 
            SET p_name=? , p_price=?, p_detail=?, image_name=?, t_id=?
            WHERE p_id =?";
    
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssssss", $name,$price,$detail,$image_name,$t_id,$id);
    $name = $_POST['p_name'];
    $price= $_POST['p_price'];
    $detail = $_POST['p_detail'];
    $image_name = $_FILES['image']['name'];
    $t_id = $_POST['t_id'];
    $id= $_POST['p_id'];
    
    $stmt->execute();

    // ปิดการเชื่อมต่อฐานข้อมูล
    $stmt->close();
    $conn->close();
    
    $imageName = $_FILES["image"]["name"];
    $imageTmpName = $_FILES["image"]["tmp_name"];
    

    // Specify the directory where you want to store the uploaded images
    $targetDirectory = "uploads/";
 
    // Create a unique filename for the uploaded image
    // $uniqueImageName = uniqid() . '_' . $imageName;
    $uniqueImageName = $imageName;
 
    // Combine the target directory with the unique image name
    $targetFilePath = $targetDirectory . $uniqueImageName;
 
    // Move the uploaded image to the specified directory
    move_uploaded_file($imageTmpName, $targetFilePath); 
    // move_uploaded_file($image_name, $targetFilePath); 
       


    // ไปยังไฟล์ showproduct.php
    header( "location: showproduct.php" );
    exit(0);
?>