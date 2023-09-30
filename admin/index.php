<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="./assets/css/login.css">
<style>
   
</style>


<div class="container mt-4" id="container">
    <div class="card">
            <?php 
                session_start();
                if(isset($_SESSION["error"])):
            ?>
                    <div class="alert alert-danger" role="alert">
                        <?php 
                            echo$_SESSION["error"];
                            session_destroy();
                        ?>
                    </div>

            <?php endif?>
        <form action="login.php" method="post" id="form">
            <div class="mt-2"><h4>Access Your Account</h4></div>
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
                <label class="form-check-label" for="gridCheck">
                    Remember me
                </label>
                </div>
            </div>
            <div class="form-group mb-3 mt-3" id="button">
                <button type="submit" class="btn btn-success btn-block" id="btn" name="login">Login</button>
            </div>
            <div class="form-group mb-3 mt-3" id="link">
                <label class="form-check-label" for="gridCheck">
                    New to Here ? <a href="">Create an account</a>
                </label>
            </div>
        </form>
        
    </div>
   
</div>