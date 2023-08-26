<?php  
    $p_id = $_GET['p_id'];
    include_once('db.php');

    $sql = "SELECT  p_id, p_name, p_price, p_detail, t_name 
            FROM product
            LEFT JOIN type
            ON  product.t_id = type.t_id 
            WHERE product.p_id = '$p_id' ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $p_id = $row['p_id'];
            $p_name = $row['p_name'];
            $p_price = $row['p_price'];
            $p_detail = $row['p_detail'];
            $t_name = $row['t_name'];
        }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลสินค้า</title>
    <link rel="stylesheet" href="../../bootstrap-5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php include('header.php') ?>
        <form action="edit_product_by_id.php" method="GET">
        <div class="row row-cols-1 mt-2">
           
            <div class="col-2">
                <label>รหัสสินค้า</label>
                <input type="text" readonly value="<?php echo $p_id; ?>" class="form-control" name="p_id"  />
            </div>
            <div class="col-3">
                <label>ชื่อสินค้า</label>
                <input type="text" value="<?php echo $p_name; ?>" class="form-control" name="p_name"  />
            </div>

            <div class="col-2">
                <label>ราคา</label>
                <input type="text" value="<?php echo $p_price; ?>" class="form-control" name="p_price"  />
            </div>
            <div class="col-6">
                <label>รายละเอียด</label>
                <textarea rows="4" cols="50" class="form-control" name="p_detail"><?php echo $p_detail; ?> </textarea>
            </div>

            <?php include_once('db.php');
                $sql = "SELECT * FROM type";
                $result = $conn->query($sql);   
            ?>
            <div class="col-6">
              <lable>ประเภทสินค้า </label>
              <select name="t_id" id="">
                <?php  while ($row  = $result->fetch_assoc()) { ?>
                   
                        <?php if($t_name == $row['t_name']){ ?>
                             <option selected value="<?php  echo $row['t_id']; ?>">
                             <?php  echo $row['t_name']; ?>

                      <?php  }else { ?>
                         
                            <option  value="<?php  echo $row['t_id']; ?>">
                            <?php  echo $row['t_name']; ?>
                    
                    </option>
                <?php
                    } }
                ?>

              </select>
            </div>


            <div class="col">
               
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary mt-3" name="save"  />
            </div>
            
        </div>
    </form>
    <?php 
     $conn->close();
    include('footer.php'); ?>
    </div>
</body>
</html>