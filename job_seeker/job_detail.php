<?php include_once("header.php"); ?>

<?php
require_once("../connection/database.php");
$id = $_GET["id"];
$sql =  "SELECT * FROM jobs WHERE job_id='$id'";
$result = $db->query($sql);
?>

<!-- Job Detail Start -->
<?php
while ($row = $result->fetch_object()) {
?>

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">

        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <input type="hidden" name="id" value="<?php echo $row->job_id ?>">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="<?php echo $row->logo ?>" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3"><?php echo $row->title ?></h3>
                            <h5 class="mb-3"><?php echo $row->company_name ?></h5>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row->address ?></span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row->timing ?></span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row->salary ?></span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <p class="mb-3"><?php echo $row->details ?></p>
                    </div>


                    <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>

                        <form action="apply.php" method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Your Name" name="name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Your Phone" name="phone">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" placeholder="Your Email" name="email">
                                </div>
                                <div class="col-6 col-sm-6">
                                    <input type="file" class="form-control bg-white" name="cv">
                                </div>
                                <div class="col-12">
                                    <textarea name="address" class="form-control" placeholder="Your Address"></textarea>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" placeholder="Coverletter" name="coverletter"></textarea>
                                </div>
                                <input type="hidden" name="jid">
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit" name="apply">Apply Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Title: <?php echo $row->title ?></p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Company Name: <?php echo $row->company_name ?></p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: <?php echo $row->vacancy ?></p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: <?php echo $row->timing ?></p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: <?php echo $row->salary ?></p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: <?php echo $row->address ?></p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: <?php echo $row->dateline ?></p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Details</h4>
                        <p class="m-0"><?php echo $row->details ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- Job Detail End -->


<?php include_once("footer.php"); ?>