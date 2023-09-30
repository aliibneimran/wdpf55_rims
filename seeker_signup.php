<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="./css/forms.css">


<?php
session_start();
if (isset($_POST["submit"])) {
    extract($_POST);
    require_once("./connection/database.php");
    $uploadDirectory = 'uploads/'; // Directory where uploaded files will be stored
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
    

    $sql = "INSERT INTO job_seeker VALUES (NULL,'$name','$phone','$email','$address','$filename','$password')";
    $db->query($sql);

    // header("Location: index.php");

    if ($db->affected_rows>0) {
        $_SESSION["myname"] = $row["js_name"];
        $_SESSION["myemail"] = $row["js_email"];
        // echo "Submited Successfull";
        header("Location: ./job_seeker/home.php");
    }
}
?>

<div class="container mt-3" id="container">
    <div class="card card-body">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" id="form" enctype="multipart/form-data">
            <div>
                <h4>As A Job Seeker</h4>
            </div>
            <hr class="hr">

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Upload Your CV</label>
                <input type="file" class="form-control" name="cv">
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>


            <div class="form-group mb-3 mt-3" id="button">
                <button type="submit" class="btn btn-success btn-block" id="btn" name="submit">Job Seeker Register</button>
            </div>

        </form>
    </div>

</div>
 