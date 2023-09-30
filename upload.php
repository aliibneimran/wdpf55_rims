<?php
// Check if the form was submitted
if (isset($_POST["submit"])) {
    $targetDirectory = "uploads/"; // Specify the directory where you want to save uploaded files
    $filename = basename($_FILES["fileToUpload"]["name"]);
    $targetFile = $targetDirectory . $filename;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        // Insert file details into the database
        $conn = new mysqli("localhost", "username", "password", "your_database");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO files (filename, filepath) VALUES ('$filename', '$targetFile')";
        
        if ($conn->query($sql) === TRUE) {
            echo "File uploaded successfully and details inserted into the database.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<?php 
$uploadDirectory = 'uploads/'; // Directory where uploaded files will be stored
$filename = basename($_FILES["cv"]["name"]);
$targetFile = $uploadDirectory . $filename; // Full path to the uploaded file

// Check if the file is a valid upload
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$allowedExtensions = array('pdf', 'doc', 'docx'); // Allowed file extensions

if (!in_array($fileType, $allowedExtensions)) {
    echo "Invalid file type. Please upload a PDF, DOC, or DOCX file.";
} else {
    // Move the uploaded file to the desired directory
    if (move_uploaded_file($_FILES['cv']['tmp_name'], $targetFile)) {
        echo "File uploaded successfully!";
    } else {
        echo "Error uploading the file.";
    }
}

?>