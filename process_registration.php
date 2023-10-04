<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $userType = $_POST["userType"];

    
    if (empty($username) || empty($password) || empty($email)) {
        echo "All fields are required.";
    } else {
       
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "jobs";

       
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       
        $sql = "INSERT INTO Users (Username, Password, Email, UserType) VALUES (?, ?, ?, ?)";

        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $hashedPassword, $email, $userType);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    }
} else {
    // Redirect to the registration form if accessed directly
    header("Location: registration_form.html");
    exit();
}
?>
