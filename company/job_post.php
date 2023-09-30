<?php 
  include_once("header.php");
  
?>
<link rel="stylesheet" href="../css/post.css">


<div class="container mt-3" id="container">
    <?php 
      if(isset($_POST["post"])){
        extract($_POST);
        require_once("../connection/database.php");

        $timing = implode(",",$time);
      
        $sql = "INSERT INTO jobs VALUE(NULL,'$cname','$title','$vacancy','$timing','$salary','$address','$phone','$email','$dateline','$details')";

        $db->query($sql);

        //header("Location: index.php");

        if($db->affected_rows){
          echo "Post A Job Successfully";
        }


       // Job_id	Title	Vacancy	Timing	Details	Salary	Address	Dateline
      }
    ?>

  <div class="card card-body">
  

  <form action="" method="post" id="form">
    <div class="row">
      <div class="form-group mb-3 mt-3 col-6">
        <label>Company Name</label>
        <input type="text" class="form-control" name="cname">
      </div>
      <div class="form-group mb-3 mt-3 col-6">
        <label>Title</label>
        <input type="text" class="form-control" name="title">
      </div>
    </div>
    <div class="row">
      <div class="form-group mb-3 mt-3 col-6">
        <label>Phone</label>
        <input type="text" class="form-control" name="phone">
      </div>
      <div class="form-group mb-3 mt-3 col-6">
        <label>Email</label>
        <input type="email" class="form-control" name="email">
      </div>
    </div>
    <div class="row">
    <div class="form-group mb-3 mt-3 col-6">
      <div>
        <label>Timing</label>
      </div>
      <div>
        <input type="checkbox" name="time[]" id="checkbox" value="Part Time"> Part Time
        <input type="checkbox" name="time[]" id="checkbox" value="Full Time"> Full Time
      </div>
    </div>
      <div class="form-group mb-3 mt-3 col-6">
        <label>Vacancy</label>
        <input type="number" class="form-control" name="vacancy">
      </div>
    </div>
    <div class="form-group mb-3 mt-3">     
      <label>Description</label>          
      <textarea class="form-control" name="details"></textarea>
    </div>
    <div class="form-group mb-3 mt-3">
      <label>Salary</label>
      <input type="text" class="form-control" name="salary">
    </div>
    <div class="form-group mb-3 mt-3">
      <label>Address</label>
      <textarea class="form-control" name="address" ></textarea>
    </div>
    <div class="form-group mb-3 mt-3">
      <label>Date line</label>
      <input type="date" class="form-control" name="dateline">
    </div>
    <!-- <div class="form-group mb-3 mt-3">
      <label>Company Logo</label>
      <input type="file" class="form-control" name="logo">
    </div> -->
    <div class="form-group mb-3 mt-3" id="button">
      <button type="submit" class="btn" name="post" id="btn">Post A Job</button>
    </div>
  </form>
  </div>

</div>

<?php include_once("footer.php");?>