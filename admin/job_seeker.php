<?php
session_start();
require_once("./include/topmenu.php");
require_once("./include/leftmenu.php");
include_once("../connection/database.php");

?>
<!-- end app-navbar -->
<!-- begin app-main -->
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="col-md-6 d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0 align-items-left">
                        <h1>List Of Job Seekers</h1>
                    </div>
                </div><br>
                <!-- <div class="col-md-6 page-title mb-2 mb-sm-0 align-items-right">
                    <a href="#addEmployeeModal" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-circle"></i><span>Add New Employee</span></a><br>
                </div> -->

                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->
        <!-- begin row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="datatable-wrapper table-responsive">
                            <table id="datatable" class="display compact table table-striped table-dark table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>CV</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="employee_data">
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

<!-- end app-container -->

<!-- View Modal -->
<div id="fileModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View CV</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body view_cv">
                <iframe id="resumeFrame" style="width: 100%; height: 500px;"></iframe>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete these Records?</p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <input type="hidden" id="delete_id">
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-danger" onclick="deleteEmployee()" value="Delete">
            </div>
        </div>
    </div>
</div>

<?php require_once("./include/footer.php") ?>
<!-- display -->
<script>
    $(document).ready(function() {
        employeeList();

    });

    function employeeList() {
        $.ajax({
            type: 'get',
            url: "./job_seeker/seeker_list.php",
            success: function(data) {
                var response = JSON.parse(data);
                console.log(response);
                var tr = '';
                var sn = 1;
                for (var i = 0; i < response.length; i++) {
                    var id = response[i].js_id;
                    var name = response[i].js_name;
                    var phone = response[i].js_phone;
                    var email = response[i].js_email;
                    var address = response[i].js_address;
                    var cv = response[i].js_cv;
                    tr += '<tr>';
                    tr += '<td>' + sn + '</td>';
                    tr += '<td>' + name + '</td>';
                    tr += '<td>' + phone + '</td>';
                    tr += '<td>' + email + '</td>';
                    tr += '<td>' + address + '</td>';

                    tr += '<td>' + '<a href="#fileModal" data-id="cv" class="m-1 btn btn-success cv" data-toggle="modal" onclick=viewCV("' +
                        address + '")><i class="fa fa-eye" data-toggle="tooltip"></i></a>' + '</td>';
                    tr += '<td><div class="d-flex">';
                    // tr +=
                    //     '<a href="#viewEmployeeModal" class="m-1 btn btn-success" data-toggle="modal" onclick=viewEmployee("' +
                    //     id + '")><i class="fa fa-eye" data-toggle="tooltip"></i></a>';

                    tr +=
                        '<a href="#deleteEmployeeModal" class="m-1 btn btn-danger" data-toggle="modal" onclick=$("#delete_id").val("' +
                        id +
                        '")><i class="fa fa-trash" data-toggle="tooltip"></i></a>';
                    tr += '</div></td>';
                    tr += '</tr>';
                    sn++;
                }
                //$('.loading').hide();
                $('#employee_data').html(tr);
            }
        });
    }
</script>
<script>
        function viewCV(resumeURL) {
            var resumeFrame = document.getElementById("resumeFrame");
            resumeFrame.src = resumeURL;
            $('#fileModal').modal('show');
        }
    </script>
<!-- view -->
<!-- <script>
    function viewCV() {
        var CV = $(this).data("id")
        $.ajax({
            url: "./job_seeker/seeker_view.php",
            type: "post",
            data: {
                id: CV,
            },
            success: function(data) {
                $(".view_cv").html(data);
                $("#fileModal").modal("show");
            },
            error: function() {
                alert("Error fetching file.");
            }
        });
    };
</script> -->

<!-- delete -->
<script>
    function deleteEmployee() {
        var id = $('#delete_id').val();
        $('#deleteEmployeeModal').modal('hide');
        $.ajax({
            type: 'get',
            data: {
                id: id,
            },
            url: "./job_seeker/seeker_delete.php",
            success: function(data) {
                var response = JSON.parse(data);
                employeeList();
                alert(response.message);
            }
        })
    }
</script>