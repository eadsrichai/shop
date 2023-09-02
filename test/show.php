<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
</head>
<body>
    <h1>Image Gallery</h1>

    <?php
    // Database connection code here (using mysqli or PDO)
    include_once('db.php');
    // Query to retrieve image data from the database
    $sql = "SELECT * FROM myimg";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageId = $row['id'];
            $imageName = $row['image_name'];
          

            // Display the image and associated information
            echo "<div>";
            echo "<img src='uploads/$imageName' width='200px' alt='Image $imageId'>";
            
            echo "</div>";
        }
    } else {
        echo "No images found in the database.";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
