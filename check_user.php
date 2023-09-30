<?php 
    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password = sha1($password); //encrypted password

        require_once("db_config.php"); //connection db file

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        

        session_start();

        if($result->num_rows>0){
            //$_SESSION["myname"] = $row["name"];
            $_SESSION["myemail"] = $row["email"];

            header("Location: job_post.php");
        }else{
            $_SESSION["error"] = "Email and Password is doesn't match";
            header("Location: employer_login.php");
        }

    }
?>
