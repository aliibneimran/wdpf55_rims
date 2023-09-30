<?php include_once("./include/header.php");?>

<?php 
    require_once("./connection/database.php");
    $sql =  "SELECT * FROM jobs";
    $result = $db->query($sql);
?>
                    <?php 
                        while($row = $result->fetch_object()){
                    ?>
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                        
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid border rounded" src="<?php //echo $row->logo ?>" alt="" style="width: 80px; height: 80px;"> -->
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"><?php echo $row->title ?></h5>
                                            <h6 class="mb-3"><?php echo $row->company_name ?></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row->address ?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row->timing?></span>
                                            <span class="text-truncate me-3"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row->salary ?></span>
                                            <span class="text-truncate me-3"><i class="far fa-calendar-alt text-primary me-2"></i><?php echo $row->dateline ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <!-- <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a> -->
                                            <a class="btn btn-primary" href="job_detail.php?id=<?php echo $row->job_id?>">Details</a>
                                        </div>
                                        <!-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i><?php //echo $row->dateline ?></small> -->
                                    </div>
                                </div>
                            </div>
                        </div> 
                    <?php }?>

                    
                        
<?php include_once("./include/footer.php");?>