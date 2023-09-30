<?php include_once("header.php");?>



<style>
    #container{
        width: 50%;
        background-color: white;
        margin: auto;
        margin-top: 10%;
        box-shadow: 1px 1px 10px 0px;
    }
    #form{
        width: 90%;
        margin: auto;
    }
    h4{
        padding-top: 20px;
        text-align: center;
        font-weight: bold;
        margin-top: 10px;
    }
    .hr{
        padding: 5px;
    }
    .loginbtn{
        padding-bottom: 30px;
    }
    #btn{
        font-weight: bold;
        font-size: 20px;
    }
</style>

<div class="container" id="container">
    <form id="form">
    <div class="heading"><h4>Post A Job</h4></div>
    <hr class="hr">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="Name">First Name</label>
            <input type="text" class="form-control" name="fname">
            </div>
            <div class="form-group col-md-6">
            <label for="Name">Last Name</label>
            <input type="text" class="form-control" name="lname">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="Father">Father Name</label>
            <input type="text" class="form-control" name="father">
            </div>
            <div class="form-group col-md-6">
            <label for="Mother">Mother Name</label>
            <input type="text" class="form-control" name="mother">
            </div>
        </div>
        <div class="form-group">
            <label for="Upload">Upload Your CV</label>
            <input type="file" class="form-control" name="cv">
        </div>
        <div class="form-group">
            <label for="Address">Address</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="City">City</label>
            <input type="text" class="form-control" name="city" placeholder="Enter Your City">
            </div>
            <div class="form-group col-md-4">
            <label for="Country">Country</label>
            <input type="text" class="form-control" name="country" placeholder="Enter Your County">
            <!-- <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select> -->
            </div>
            <div class="form-group col-md-4">
            <label for="Zip">Zip</label>
            <input type="text" class="form-control" name="zip" placeholder="Enter Your Zip">
            </div>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
            <label for="Password">Confirm Password</label>
            <input type="password" class="form-control" name="password" placeholder="Confirm Password">
            </div>
        </div>
        
        <div class="loginbtn">
            <button type="submit" class="btn btn-success btn-block" id="employee_btn">Employee Register</button>
        </div>
        
    </form>
</div>

<?php include_once("footer.php");?>