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
        <form action="addproduct.php" method="POST" enctype="multipart/form-data">
        <div class="row row-cols-1 mt-2">
           
            <div class="col-2">
                <label>รหัสสินค้า</label>
                <input type="text" value="" class="form-control" name="p_id"  />
            </div>
            <div class="col-3">
                <label>ชื่อสินค้า</label>
                <input type="text" value="" class="form-control" name="p_name"  />
            </div>

            <div class="col-2">
                <label>ราคา</label>
                <input type="text" value="" class="form-control" name="p_price"  />
            </div>
            <div class="col">
                <label for="formFile" class="form-label">เลือกรูป</label>
                <input class="form-control w-25" type="file" name="image" id="formFile">
            </div>
            <div class="col-5">
                <label>รายละเอียด</label>
                <textarea rows="4" cols="50" class="form-control" name="p_detail"> </textarea>
            </div>

            <?php include_once('db.php');
                $sql = "SELECT * FROM type";
                $result = $conn->query($sql);   
            ?>
            <div class="col-6">
              <lable>ประเภทสินค้า </label>
              <select name="t_id" id="">
                <?php  while ($row  = $result->fetch_assoc()) { ?>
                    <option value="<?php  echo $row['t_id']; ?>">
                        <?php  echo $row['t_name']; ?>
                    </option>
                <?php
                    }
                ?>

              </select>
            </div>

            <div class="col">
               
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary mt-3" name="save"  />
            </div>
            
        </div>
    </form>
    <?php  include('footer.php'); ?>
    </div>
</body>
</html>