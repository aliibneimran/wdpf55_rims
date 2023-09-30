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
                        <h1>List Of Locations</h1>
                    </div>
                </div><br>
                <div class="col-md-6 page-title mb-2 mb-sm-0 align-items-right">
                    <a href="#addUserModal" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-circle"></i><span>Add New Location</span></a><br>
                </div>

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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="location_data">
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
<!-- View Modal -->
<div id="viewLocationmodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Location</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body view_employee">

            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
            </div>
        </div>
    </div>
</div>
<!-- Delete User -->
<div id="deleteLocationModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Location</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete these Records?</p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <input type="hidden" id="delete_id">
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-danger" onclick="deleteLocation()" value="Delete">
            </div>
        </div>
    </div>
</div>

<?php require_once("./include/footer.php") ?>

<!-- display -->
<script>
    $(document).ready(function() {
        LocationList();

    });

    function LocationList() {
        $.ajax({
            type: 'get',
            url: "./location/location_list.php",
            success: function(data) {
                var response = JSON.parse(data);
                console.log(response);
                var tr = '';
                var sn = 1;
                for (var i = 0; i < response.length; i++) {

                    var id = response[i].id;
                    var name = response[i].name;

                    tr += '<tr>';
                    tr += '<td>' + sn + '</td>';
                    tr += '<td>' + name + '</td>';

                    tr += '<td><div class="d-flex">';
                    tr += '<a href="#viewCVmodal" class="m-1 btn btn-success" data-toggle="modal" onclick=viewApplication("' +
                        id + '")><i class="fa fa-eye" data-toggle="tooltip"></i></a>';
                    tr +=
                        '<a href="#editCompanyModal" class="m-1 btn btn-primary" data-toggle="modal" onclick=viewCompany("' +
                        id +
                        '")><i class="fa fa-edit" data-toggle="tooltip"></i></a>';
                    tr +=
                        '<a href="#deleteApplicantModal" class="m-1 btn btn-danger" data-toggle="modal" onclick=$("#delete_id").val("' +
                        id +
                        '")><i class="fa fa-trash" data-toggle="tooltip"></i></a>';
                    tr += '</div></td>';
                    tr += '</tr>';
                    sn++;
                }
                //$('.loading').hide();
                $('#location_data').html(tr);
            }
        });
    }
</script>
<!-- delete -->
<script>
    function deleteapplicant() {
        var id = $('#delete_id').val();
        $('#deleteApplicantModal').modal('hide');
        $.ajax({
            type: 'get',
            data: {
                id: id,
            },
            url: "./applicant/applicant_delete.php",
            success: function(data) {
                var response = JSON.parse(data);
                applicantsList();
                alert(response.message);
            }
        })
    }
</script>