<?php include_once("header.php"); ?>
<link rel="stylesheet" href="style.css">

<div class="container rounded bg-white mt-5 mb-5">
    <?php
    require_once("../connection/database.php");
    //$id = $_REQUEST["id"];
    $sql =  "SELECT * FROM job_seeker";
    $result = $db->query($sql);
    while ($row = $result->fetch_object()) {;
    ?>
        <form action="" method="get">
        <div class="row">
            <input type="hidden" name="id" value="<?php //echo $row->js_id ?>">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $row->js_name ?></span><span class="text-black-50"><?php echo $row->js_email ?></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <form action="" method="post">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="mt-3">
                        <label class="labels">Name</label>
                        <input type="text" class="form-control" value="<?php echo $row->js_name ?>">
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input type="text" class="form-control" value="<?php echo $row->js_phone ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email ID</label>
                            <input type="text" class="form-control" value="<?php echo $row->js_email ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <textarea name="address" class="form-control"><?php echo $row->js_address ?></textarea>
                        </div>
                        <!-- <div class="col-md-12">
                            <label class="labels">Cover Letter</label>
                            <textarea name="address" class="form-control"><?php //echo $row->coverletter?></textarea>
                        </div> -->
                        <!-- <div class="col-md-12">
                            <label class="labels">Education</label>
                            <input type="text" class="form-control" value="">
                        </div> -->
                    </div>
                    <!-- <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Country</label>
                            <input type="text" class="form-control" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">State/Region</label>
                            <input type="text" class="form-control" value="">
                        </div>
                    </div> -->
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="button" name="submit">Save Profile</button>
                    </div>
                </div> 
                </form>
                
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" value=""></div>
                </div>
            </div>
        </div>
        </form>
        <?php } ?>
</div>
</div>
</div>
<?php include_once("footer.php"); ?>