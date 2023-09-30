<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">


<link rel="stylesheet" href="./css/forms.css">

<?php
if (isset($_POST["submit"])) {
    extract($_POST);
    require_once("./connection/database.php");

    $sql = "INSERT INTO company VALUES (NULL,'$name','$type','$phone','$email','$address','$password')";
    $db->query($sql);

    // header("Location: index.php");

    if ($db->affected_rows) {
        // echo "Submited Successfull";
        header("Location: ./company/home.php");
    }
}
?>

<div class="container mt-3" id="container">
    <div class="card card-body">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" id="form">
            <div class="heading">
                <h4>Company Registration</h4>
            </div>
            <hr id="hr">

            <div class="form-group">
                <label for="Name">Company Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="Type">Company Type</label>
                <input type="text" class="form-control" name="type">
            </div>
            <div class="form-group">
                <label for="Phone">Phone</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group mb-3 mt-3" id="button">
                <button type="submit" class="btn btn-success btn-block" id="btn" name="submit">Company Register</button>
            </div>

        </form>
    </div>

</div>