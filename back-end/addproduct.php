<?php
include_once('db.php');
$p_id = $_POST['p_id'];
$sql1 = "SELECT p_id FROM product WHERE p_id ='$p_id'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
   echo "รหัสรายการสินค้านี้มีอยู่แล้ว";
   echo "<a href='showproduct.php'>เพิ่มรายการสินค้า</a>";
}else {

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
   if (move_uploaded_file($imageTmpName, $targetFilePath)) {
       // Image uploaded successfully to the external folder





$sql = "INSERT INTO product(p_id,p_name,p_price,p_detail,image_name,t_id)VALUES(?,?,?,?,?,?)";

include_once('db.php');

$stmt = $conn->prepare($sql);
   $stmt->bind_param("ssssss", $p_id, $p_name, $p_price,$p_detail,$image_name,$t_id);
   // นำค่าที่รับมา กำหนดให้กับตัวแปรสำหรับ bind
   $p_id = $_POST['p_id'];
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_detail = $_POST['p_detail'];
   $image_name = $_FILES['image']['name'];
   $t_id = $_POST['t_id'];

    // ทำการประมวลผลการเพิ่มข้อมูล
   $stmt->execute();
    //  ปิดการเชื่อมต่อ
   $stmt->close();
    //  ปิดการเชื่อมต่อฐานข้อมูล
   $conn->close();
    //  ย้ายตำแหน่งในการแสดงผลไปที่ showproduct.php และออกจากคำสั่งทั้งหมด  exit(0)
   header( "location: showproduct.php" );
   exit(0);
}
}
?>