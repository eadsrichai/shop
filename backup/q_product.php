<?php
include_once('db.php');

$sql = "SELECT  p_id, p_name, p_price, p_detail 
        FROM product
        WHERE p_id = $p_id";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $p_id = $row['p_id'];
        $p_name = $row['p_name'];
        $p_price = $row['p_price'];
        $p_detail = $row['p_detail'];
    }
}

?>