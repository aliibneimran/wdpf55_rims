<?php
session_start();
if (isset($_POST["apply"])) {
    extract($_POST);
    require_once("../connection/database.php");
    $uploadDirectory = '../uploads/'; // Directory where uploaded files will be stored
    $_SESSION['filename'] = basename($_FILES["cv"]["name"]);
    $filename = $_SESSION['filename'];
    $_SESSION["targetFile"] = $uploadDirectory.$filename; // Full path to the uploaded file
    $targetFile = $_SESSION["targetFile"];

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
    

    $sql = "INSERT INTO applicants VALUES (NULL,'$name','$phone','$email','$filename','$address,'$coverletter')";
    $db->query($sql);

    // header("Location: index.php");

    if ($db->affected_rows>0) {
         $_SESSION["myname"] = $row["js_name"];
         $_SESSION["myemail"] = $row["js_email"];
         echo "Submited Successfull";
        header("Location: home.php");
    }
}
?>