<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="./css/login.css">

<?php 
    require_once("./connection/database.php"); //connection db file

    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        //$password = sha1($password); //encrypted password


        $sql = "SELECT * FROM  job_seeker WHERE js_email='$email' AND js_password='$password'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();

        session_start();

        if($result->num_rows>0){
            $_SESSION["id"] = $row["js_id"];
            $_SESSION["myname"] = $row["js_name"];
            $_SESSION["myemail"] = $row["js_email"];

            header("Location: ./job_seeker/home.php");
        }else{
            $_SESSION["error"] = "Email and Password is doesn't match";
            header("Location: login.php");
        }
    }
?>


<div class="container mt-3" id="container">
    <div class="card card-body">
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="form">
        <div class="heading"><h4>Access Your Account</h4></div>
        <hr id="hr">
        <div class="form-group mb-3 mt-3">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>       
        <div class="form-group mb-3 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label">
                    Remember me
                </label>
            </div>
        </div>
        <div class="form-group mb-3 mt-3" id="button">
            <button type="submit" class="btn btn-success btn-block" id="btn" name="login">Login</button>
        </div>
        <div class="form-group" id="link">
            <label class="form-check-label">
                New to Here ? <a href="seeker_signup.php">Create an account</a>
            </label>
        </div>
    </form>
    </div>
    
</div>