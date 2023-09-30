<?php require_once("./include/topmenu.php") ?>
<?php require_once("./include/leftmenu.php") ?>

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
                        <h1>List Of Vacancies</h1>
                    </div>
                </div><br>
                <!-- <div class="col-md-6 page-title mb-2 mb-sm-0 align-items-right">
                    <a href="#addVacancyModal" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-circle"></i><span>Add New Vacancy</span></a><br>
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
                                        <th>Job Title</th>
                                        <th>Company Name</th>
                                        <th>Vacancy</th>
                                        <th>Timing</th>
                                        <th>Salary</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Dateline</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="vacancy_data">
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
<!-- end app-main
<!-- View Details -->
<div id="viewDetails" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Job Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">               
                <div id="detail"></div>
            </div>
            <input type="hidden" id="">
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
            </div>
        </div>
    </div>
</div>

 <!-- Delete Modal -->
<div id="deleteVacancyModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Vacancy</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete these Records?</p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <input type="hidden" id="delete_id">
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-danger" onclick="deleteVacancy()" value="Delete">
            </div>
        </div>
    </div>
</div>

<?php require_once("./include/footer.php") ?>

<!-- display -->
<script>
    $(document).ready(function() {
        vacancyList();

    });

    function vacancyList() {
        $.ajax({
            type: 'get',
            url: "./vacancy/vacancy_list.php",
            success: function(data) {
                var response = JSON.parse(data);
                console.log(response);
                var tr = '';
                var sn = 1;
                for (var i = 0; i < response.length; i++) {
                    var id = response[i].job_id;
                    var title = response[i].title;
                    var c_name = response[i].company_name;
                    var vacancy = response[i].vacancy;
                    var timing = response[i].timing;
                    var salary = response[i].salary;
                    var address = response[i].address;
                    var phone = response[i].phone;
                    var email = response[i].email;
                    var dateline = response[i].dateline;
                    var details = response[i].details;
                    tr += '<tr>';
                    tr += '<td>' + sn + '</td>';
                    tr += '<td>' + title + '</td>';
                    tr += '<td>' + c_name + '</td>';
                    tr += '<td>' + vacancy + '</td>';
                    tr += '<td>' + timing + '</td>';
                    tr += '<td>' + salary + '</td>';
                    tr += '<td>' + address + '</td>';
                    tr += '<td>' + phone + '</td>';
                    tr += '<td>' + email + '</td>';
                    tr += '<td>' + dateline + '</td>';
                    tr += '<td>' + '<a href="#viewDetails" class="m-1 btn btn-success" data-toggle="modal" onclick=viewEmployee("' +
                        details + '")><i class="fa fa-eye" data-toggle="tooltip"></i></a>' + '</td>';
                    tr += '<td><div class="d-flex">';
                    // tr +=
                    //     '<a href="#editEmployeeModal" class="m-1 btn btn-primary" data-toggle="modal" onclick=viewEmployee("' +
                    //     id +
                    //     '")><i class="fa fa-edit" data-toggle="tooltip"></i></a>';
                    tr +=
                        '<a href="#deleteVacancyModal" class="m-1 btn btn-danger" data-toggle="modal" onclick=$("#delete_id").val("' +
                        id +
                        '")><i class="fa fa-trash" data-toggle="tooltip"></i></a>';
                    tr += '</div></td>';
                    tr += '</tr>';
                    sn++;
                }
                //$('.loading').hide();
                $('#vacancy_data').html(tr);
            }
        });
    }
</script>
<!-- <script>
      function viewDetail(ID = 2) {
            $.ajax({
                type: 'get',
                data: {
                    id: ID,
                },
                url: "./user/user_view.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    $('.edit_user #detail').val(response.details);
                }
            })
        }
</script> -->
<!-- delete -->
<script>
    function deleteVacancy() {
        var id = $('#delete_id').val();
        $('#deleteVacancyModal').modal('hide');
        $.ajax({
            type: 'get',
            data: {
                id: id,
            },
            url: "./vacancy/vacancy_delete.php",
            success: function(data) {
                var response = JSON.parse(data);
                vacancyList();
                alert(response.message);
            }
        })
    }
</script>