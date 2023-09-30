<?php require_once("./include/topmenu.php") ?>
<?php require_once("./include/leftmenu.php") ?>
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
                        <h1>List Of Companies</h1>
                    </div>
                </div><br>

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
                                        <th>Type</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="company_data">
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

<!-- Edit Modal -->
<div id="editCompanyModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Company</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body edit_company">
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Company Type</label>
                    <input type="text" id="type" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Company Phone</label>
                    <input type="text" id="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Company Email</label>
                    <input type="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Company Address</label>
                    <textarea class="form-control" id="address" required></textarea>
                    <input type="hidden" id="c_id" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Update" onclick="editCompany()">
            </div>
        </div>
    </div>
</div>
<!-- View Modal -->
<div id="viewCompanyModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Company</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body view_company">
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" id="name" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Company Type</label>
                    <input type="text" id="type" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Company Phone</label>
                    <input type="text" id="phone" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Company Email</label>
                    <input type="email" id="email" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Company Address</label>
                    <textarea class="form-control" id="address" readonly></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div id="deleteCompanyModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Company</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete these Records?</p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <input type="hidden" id="delete_id">
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-danger" onclick="deleteCompany()" value="Delete">
            </div>
        </div>
    </div>
</div>

<?php require_once("./include/footer.php") ?>

<script>
    $(document).ready(function() {
        companyList();

    });

    function companyList() {
        $.ajax({
            type: 'get',
            url: "./company/company_list.php",
            success: function(data) {
                var response = JSON.parse(data);
                console.log(response);
                var tr = '';
                var sn = 1;
                for (var i = 0; i < response.length; i++) {
                    var id = response[i].c_id;
                    var name = response[i].c_name;
                    var type = response[i].c_type;
                    var phone = response[i].c_phone;
                    var email = response[i].c_email;
                    var address = response[i].c_address;
                    tr += '<tr>';
                    tr += '<td>' + sn + '</td>';
                    tr += '<td>' + name + '</td>';
                    tr += '<td>' + type + '</td>';
                    tr += '<td>' + phone + '</td>';
                    tr += '<td>' + email + '</td>';
                    tr += '<td>' + address + '</td>';
                    tr += '<td><div class="d-flex">';
                    tr +=
                        '<a href="#viewCompanyModal" class="m-1 btn btn-success" data-toggle="modal" onclick=viewCompany("' +
                        id + '")><i class="fa fa-eye" data-toggle="tooltip"></i></a>';
                    tr +=
                        '<a href="#editCompanyModal" class="m-1 btn btn-primary" data-toggle="modal" onclick=viewCompany("' +
                        id +
                        '")><i class="fa fa-edit" data-toggle="tooltip"></i></a>';
                    tr +=
                        '<a href="#deleteCompanyModal" class="m-1 btn btn-danger" data-toggle="modal" onclick=$("#delete_id").val("' +
                        id +
                        '")><i class="fa fa-trash" data-toggle="tooltip"></i></a>';
                    tr += '</div></td>';
                    tr += '</tr>';
                    sn++;
                }
                //$('.loading').hide();
                $('#company_data').html(tr);
            }
        });
    }
</script>
<script>
    function editCompany() {
        var name = $('.edit_company #name').val();
        var type = $('.edit_company #type').val();
        var phone = $('.edit_company #phone').val();
        var email = $('.edit_company #email').val();
        var address = $('.edit_company #address').val();
        var c_id = $('.edit_company #c_id').val();

        $.ajax({
            type: 'post',
            data: {
                name: name,
                type: type,
                phone: phone,
                email: email,
                address: address,
                c_id: c_id,
            },
            url: "./company/company_edit.php",
            success: function(data) {
                var response = JSON.parse(data);
                $('#editCompanyModal').modal('hide');
                companyList();
                alert(response.message);
            }

        })
    }
</script>
<script>
    function viewCompany(ID = 2) {
        $.ajax({
            type: 'get',
            data: {
                id: ID,
            },
            url: "./company/company_view.php",
            success: function(data) {
                var response = JSON.parse(data);
                $('.edit_company #name').val(response.c_name);
                $('.edit_company #type').val(response.c_type);
                $('.edit_company #phone').val(response.c_phone);
                $('.edit_company #email').val(response.c_email);
                $('.edit_company #address').val(response.c_address);

                $('.edit_company #c_id').val(response.c_id);

                $('.view_company #name').val(response.c_name);
                $('.view_company #type').val(response.c_type);
                $('.view_company #phone').val(response.c_phone);
                $('.view_company #email').val(response.c_email);
                $('.view_company #address').val(response.c_address);
            }
        })
    }
</script>
<script>
    function deleteCompany() {
        var id = $('#delete_id').val();
        $('#deleteCompanyModal').modal('hide');
        $.ajax({
            type: 'get',
            data: {
                id: id,
            },
            url: "./company/company_delete.php",
            success: function(data) {
                var response = JSON.parse(data);
                companyList();
                alert(response.message);
            }
        })
    }
</script>