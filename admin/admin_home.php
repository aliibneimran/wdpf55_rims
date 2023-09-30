<?php
    session_start();
    if (!isset($_SESSION["myemail"])) {
        header("Location: index.php");
    }
?>
<?php 
    require_once("./include/topmenu.php");
    require_once("./include/leftmenu.php");
    require_once("../connection/database.php");
?>

<!-- begin app-main -->
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-lg-flex flex-nowrap align-items-center">
                    <div class="page-title mr-4 pr-4 border-right">
                        <h1>Dashboard</h1>
                    </div>

                    <div class="ml-auto d-flex align-items-center secondary-menu text-center">
                        <a href="javascript:void(0);" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Todo list">
                            <i class="fe fe-edit btn btn-icon text-primary"></i>
                        </a>
                        <a href="javascript:void(0);" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Projects">
                            <i class="fa fa-lightbulb-o btn btn-icon text-success"></i>
                        </a>
                        <a href="javascript:void(0);" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Task">
                            <i class="fa fa-check btn btn-icon text-warning"></i>
                        </a>
                        <a href="javascript:void(0);" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Calendar">
                            <i class="fa fa-calendar-o btn btn-icon text-cyan"></i>
                        </a>
                        <a href="javascript:void(0);" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Analytics">
                            <i class="fa fa-bar-chart-o btn btn-icon text-danger"></i>
                        </a>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- Notification -->
        <div class="row">
            <div class="col-md-12">
                <style>
                    #title{
                        text-align: center;
                        font-weight: 600;
                    }
                    #para{
                        text-align: justify;
                        color: black;
                    }
                </style>
                <div class="jumbotron">
                    <h1 id="title">Welcome To Our Website</h1>
                    <p id="para">The Online Job Portal System, is a simple web application develop in PHP MySQL, using HTML, CSS, JavaScript, Modal, Ajax, and Bootstrap. The system contains of admin and user, the admin can manage like control user, add new user, edit, and delete, the user represent as staff and applicant the difference the staff is admin control but user applicant came from online application anytime can make their own account and also admin can manage.
                    </p>
                </div>
            </div>
        </div>
        <!-- begin row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-statistics">
                    <div class="row no-gutters">
                        <div class="col-xxl-3 col-lg-6">
                            <?php 
                                $sql =  "SELECT COUNT(*) as company_count FROM company";
                                $result = $db->query($sql);
                                $row = $result->fetch_assoc();
                                $companyCount = $row["company_count"];
                            ?>
                            <div class="p-20 border-lg-right border-bottom border-xxl-bottom-0">
                                <div class="d-flex m-b-10">
                                    <p class="mb-0 font-regular text-muted font-weight-bold">Total Company</p>
                                    <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i>
                                    </a>
                                </div>
                                <div class="d-block d-sm-flex h-100 align-items-center">
                                    <div class="apexchart-wrapper">
                                        <div id="analytics7"></div>
                                    </div>
                                    <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i><?php echo $companyCount?></h3>
                                        <!-- <p>Monthly visitor</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6">
                            <?php 
                                $sql =  "SELECT COUNT(*) as seeker FROM Job_seeker";
                                $result = $db->query($sql);
                                $row = $result->fetch_assoc();
                                $seekerCount = $row["seeker"];
                            ?>
                            <div class="p-20 border-xxl-right border-bottom border-xxl-bottom-0">
                                <div class="d-flex m-b-10">
                                    <p class="mb-0 font-regular text-muted font-weight-bold">Total Job Seeker</p>
                                    <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i>
                                    </a>
                                </div>
                                <div class="d-block d-sm-flex h-100 align-items-center">
                                    <div class="apexchart-wrapper">
                                        <div id="analytics8"></div>
                                    </div>
                                    <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> <?php echo $seekerCount?></h3>
                                        <!-- <p>This month</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6">
                            <?php 
                                $sql =  "SELECT COUNT(*) as job FROM jobs";
                                $result = $db->query($sql);
                                $row = $result->fetch_assoc();
                                $jobCount = $row["job"];
                            ?>
                            <div class="p-20 border-lg-right border-bottom border-lg-bottom-0">
                                <div class="d-flex m-b-10">
                                    <p class="mb-0 font-regular text-muted font-weight-bold">Total Jobs</p>
                                    <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i>
                                    </a>
                                </div>
                                <div class="d-block d-sm-flex h-100 align-items-center">
                                    <div class="apexchart-wrapper">
                                        <div id="analytics9"></div>
                                    </div>
                                    <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i><?php echo $jobCount?></h3>
                                        <!-- <p>Avg. Sales per day</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6">
                            <?php 
                                $sql =  "SELECT COUNT(*) as applicant FROM applicants";
                                $result = $db->query($sql);
                                $row = $result->fetch_assoc();
                                $applicantCount = $row["applicant"];
                            ?>
                            <div class="p-20 border-lg-right border-bottom border-lg-bottom-0">
                                <div class="d-flex m-b-10">
                                    <p class="mb-0 font-regular text-muted font-weight-bold">Total Applicants</p>
                                    <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i>
                                    </a>
                                </div>
                                <div class="d-block d-sm-flex h-100 align-items-center">
                                    <div class="apexchart-wrapper">
                                        <div id="analytics10"></div>
                                    </div>
                                    <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i><?php echo $applicantCount?></h3>
                                        <!-- <p>Avg. Sales per day</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- end row -->

    </div>
    <!-- end container-fluid -->
</div>
<!-- end app-main -->



<?php require_once("./include/footer.php") ?>