<?php
    session_start();
    if(isset($_SESSION['username']) && $_SESSION['username'] != null && isset($_SESSION['password']) && $_SESSION['password'] != null){
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงรายการสินค้า</title>
    <link rel="stylesheet" href="../../bootstrap-5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class='container'>
<?php  include('header.php');   ?>


<?php

include_once('db.php');

$sql = "SELECT  p_id, p_name, p_price, p_detail, t_name 
        FROM product
        LEFT JOIN type
        ON product.t_id = type.t_id";

$result = $conn->query($sql);  ?>


    <div class='row'>
        <div class="col-2">
            <a href='formaddproduct.php' class='btn btn-primary'>เพิ่มสินค้า</a>
        </div>
        <div class='col-2'>
            <form action='' method='GET' >
            <input class='btn btn-primary' type='submit' value='ค้นหา'  name='find_by_id'/>
        </div>
        <div class='col-2'>
            <input class='form-control' type='text' value=''  name='p_id'/>
        </div>
        </form>
        <div class="col d-flex justify-content-end">
            <a href="delsession.php" class="btn btn-sm btn-outline-secondary">Logout</a>
        </div>
    </div>

<table class='table table-hover'>

<?php
if ($result->num_rows > 0) {
    echo "<thead><tr>
        <th>รหัสสินค้า</th>
        <th>ชื่อสินค้า</th>
        <th>ราคา</th>
        <th>รายละเอียด</th>
        <th>ประเภทสินค้า</th>
        <th cols='2' class='text-center'>Action</th>
        <th></th>
        </tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        $p_id = $row['p_id'];
        echo "<td>" .$p_id. "</td>";
        echo "<td>" .$row['p_name']. "</td>";
        echo "<td>" .$row['p_price']. "</td>";
        echo "<td>" .$row['p_detail']. "</td>";
        echo "<td>" .$row['t_name']. "</td>";
        echo "<td><a class='btn btn-outline-warning' href='editproduct.php?p_id=".$p_id."'>Edit</a></td>";
        echo "<td><a class='btn btn-outline-danger' href='delete_product_by_id.php?p_id=".$p_id."'>Del</a></td>";
        echo "</tr>";
}
    echo "<tbody>";
} else {
    echo "0 results";
}
echo "</table>";

$conn->close();

?>
<?php  include('footer.php'); ?>
</div>

</body>
</html>

<?php
    }else{
        header( "location: index.php" );
        exit(0);
    }

?>