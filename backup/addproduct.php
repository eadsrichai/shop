<?php
include_once('db.php');
$p_id = $_GET['p_id'];
$sql1 = "SELECT p_id FROM product WHERE p_id ='$p_id'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
   echo "รหัสรายการสินค้านี้มีอยู่แล้ว";
   echo "<a href='showproduct.php'>เพิ่มรายการสินค้า</a>";
}else {

$sql = "INSERT INTO product(p_id,p_name,p_price,p_detail)VALUES(?,?,?,?)";

include_once('db.php');

$stmt = $conn->prepare($sql);
   $stmt->bind_param("ssss", $p_id, $p_name, $p_price,$p_detail);
   // นำค่าที่รับมา กำหนดให้กับตัวแปรสำหรับ bind
   $p_id = $_GET['p_id'];
   $p_name = $_GET['p_name'];
   $p_price = $_GET['p_price'];
   $p_detail = $_GET['p_detail'];

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

?>