<?php
// Database connection code here (using mysqli or PDO)
include_once('db.php');
if(isset($_POST["submit"])) {
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

        // Database insertion code here (insert $uniqueImageName into your database table)
        $stmt = $conn->prepare("INSERT INTO myimg (image_name) VALUES (?)");
        $stmt->bind_param("s", $imageName);
    
        if ($stmt->execute()) {
            $databaseInsertionSuccessful = true;
        } else {
              $databaseInsertionSuccessful = false;
        }
    
    $stmt->close();
    $conn->close();

        if ($databaseInsertionSuccessful) {
            echo "Image uploaded and stored successfully.";
        } else {
            echo "Error uploading image to the database.";
        }
    } else {
        echo "Error uploading image to the folder.";
    }
}
?>
