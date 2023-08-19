
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
<?php  include('../back-end/header.php');   ?>

<div style="height: 70vh;">

<?php
include_once('../back-end/db.php');

$sql = "SELECT  p_id, p_name, p_price, p_detail FROM product";

$result = $conn->query($sql);


echo  "<div class='row'>";

echo  "<form action='' method='GET' >";
echo  "<div class='col-3'>";
echo  "<input class='form-control' type='text' value=''  name='p_id'/>";
echo  "<div";
echo  "<div class='col-3'>";
echo  "<input class='btn btn-primary' type='submit' value='ค้นหา'  name='find_by_id'/>";
echo  "<div>";
echo  "</form>";
echo  "</div>";
echo  "</div>";

echo "<table class='table table-hover'>";
if ($result->num_rows > 0) {
    echo "<thead><tr>
        <th>รหัสสินค้า</th>
        <th>ชื่อสินค้า</th>
        <th>ราคา</th>
        <th>รายละเอียด</th>
        
        <th></th>
        </tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        $p_id = $row['p_id'];
        echo "<td>" .$p_id. "</td>";
        echo "<td>" .$row['p_name']. "</td>";
        echo "<td>" .$row['p_price']. "</td>";
        echo "<td>" .$row['p_detail']. "</td>";
        
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
<?php  include('../back-end/footer.php'); ?>
</div>

</body>
</html>

