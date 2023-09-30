
<?php require_once("header.php")?>       
                <!-- end app-navbar -->
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>List Of Companies</h1>
                                    </div>                                      
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                        <?php 
                                            //session_start();
                                            if(isset($_SESSION["msg"])):
                                                $msg = $_SESSION["msg"];
                                        ?>
                                        <div class="alert alert-success"><?php echo $msg;?></div>
                                        <?php 
                                            unset($_SESSION["msg"]);
                                            endif;
                                        ?>
                                    <div class="card-body">
                                        <a href="./company/company_entry.php" class="btn btn-success">Add New Company</a><br><br>
                                        <div class="datatable-wrapper table-responsive">
                                        
                        
            <?php 
                require_once("database.php");
                $sql =  "SELECT * FROM company";
                $result = $db->query($sql);
            ?>
                                            <table id="datatable" class="display compact table table-striped table-dark table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Company Name</th>
                                                        <th>Type</th>
                                                        <th>Address</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Action</th>
                                                        
                                                    </tr>          
                                                </thead>
                                                <tbody>
                <?php 
                    $sn = 1;
                    while($row = $result->fetch_object()):
                ?>
                                                    <tr>
                                                        <td><?php echo $sn ?></td>
                                                        <td><?php echo $row->Name ?></td>
                                                        <td><?php echo $row->Type ?></td>
                                                        <td><?php echo $row->Address ?></td>
                                                        <td><?php echo $row->Email ?></td>
                                                        <td><?php echo $row->Phone ?></td>
                                                        <td>
                                                            <a href="./company/company_edit.php?id=<?php echo $row->Company_id?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    
                                                            <a href="./company/company_delete.php?id=<?php echo $row->Company_id?>" class="btn btn-danger" onclick="return confirm('Are you sure DELETE ?')"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>  
                <?php 
                    $sn++;
                    endwhile
                ?>                                     
                                                </tbody>
                                                
                                            </table>
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
            </div>
            <!-- end app-container -->

<?php require_once("footer.php")?>           