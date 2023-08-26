<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงรายการสินค้า</title>
    <link rel="stylesheet" href="../bootstrap-5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class='container'>
<?php  include('header.php');   ?>

<div style="height: 70vh;">

<?php
include_once('db.php');

$sql = "SELECT  t_id, t_name FROM type";

$result = $conn->query($sql);

echo "<a href='formaddproduct.php'>เพิ่มสินค้า</a>";
echo  "<div class='row'>";



echo "<table class='table table-hover'>";
if ($result->num_rows > 0) {
    echo "<thead><tr>
        <th>รหัสประเภท</th>
        <th>ชื่อประเภท</th>
        <th cols='2' class='text-center'>Action</th>
        <th></th>
        </tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        $t_id = $row['t_id'];
        echo "<td>" .$t_id. "</td>";
        echo "<td>" .$row['t_name']. "</td>";
        
        echo "<td><a class='btn btn-outline-warning' href='editproduct.php?t_id=".$t_id."'>Edit</a></td>";
        echo "<td><a class='btn btn-outline-danger' href='delete_product_by_id.php?t_id=".$t_id."'>Del</a></td>";
        echo "</tr>";
}
    echo "<tbody>";
} else {
    echo "0 results";
}
echo "</table>";

$conn->close();
?>

</div>
<?php  include('footer.php'); ?>
</div>

</body>
</html>