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
                        <h1>List Of Users</h1>
                    </div>
                </div><br>
                <div class="col-md-6 page-title mb-2 mb-sm-0 align-items-right">
                    <a href="#addUserModal" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-circle"></i><span>Add New User</span></a><br>
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
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="user_data">
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

<!-- Add User -->
<div id="addUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body add_user">
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>User Role</label>
                    <input type="text" id="role" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>User Email</label>
                    <input type="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>User Password</label>
                    <input type="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>User Status</label>
                    <input type="text" id="status" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Add" onclick="addUser()">
            </div>
        </div>
    </div>
</div>
<!-- View User -->
<div id="viewUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body view_user">
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>User Role</label>
                    <input type="text" id="role" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>User Email</label>
                    <input type="email" id="email" class="form-control" required>
                </div>
                <!-- <div class="form-group">
                    <label>User Password</label>
                    <input type="password" id="password" class="form-control" required>
                </div> -->
                <div class="form-group">
                    <label>User Status</label>
                    <input type="text" id="status" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Update" onclick="viewUser()">
            </div>
        </div>
    </div>
</div>
<!-- Edit User -->
<div id="editUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body edit_user">
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>User Role</label>
                    <input type="text" id="role" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>User Email</label>
                    <input type="email" id="email" class="form-control" required>
                </div>
                <!-- <div class="form-group">
                    <label>User Password</label>
                    <input type="password" id="password" class="form-control" required>
                </div> -->
                <div class="form-group">
                    <label>User Status</label>
                    <input type="text" id="status" class="form-control" required>
                    <input type="hidden" id="u_id" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Update" onclick="editUser()">
            </div>
        </div>
    </div>
</div>
<!-- Delete User -->
<div id="deleteUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete these Records?</p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <input type="hidden" id="delete_id">
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-danger" onclick="deleteUser()" value="Delete">
            </div>
        </div>
    </div>
</div>
<?php require_once("./include/footer.php") ?>

<!-- display -->
<script>
    $(document).ready(function() {
        userList();

    });

    function userList() {
        $.ajax({
            type: 'get',
            url: "./user/user_list.php",
            success: function(data) {
                var response = JSON.parse(data);
                console.log(response);
                var tr = '';
                var sn = 1;
                for (var i = 0; i < response.length; i++) {
                    var id = response[i].user_id;
                    var name = response[i].name;
                    var role = response[i].role;
                    var email = response[i].email;
                    var status = response[i].status;
                    tr += '<tr>';
                    tr += '<td>' + sn + '</td>';
                    tr += '<td>' + name + '</td>';
                    tr += '<td>' + role + '</td>';
                    tr += '<td>' + email + '</td>';
                    tr += '<td>' + status + '</td>';
                    tr += '<td><div class="d-flex">';
                    tr +=
                        '<a href="#viewUserModal" class="m-1 btn btn-success" data-toggle="modal" onclick=viewUser("' +
                        id + '")><i class="fa fa-eye" data-toggle="tooltip"></i></a>';
                    // tr +=
                    //     '<a href="#editUserModal" class="m-1 btn btn-primary" data-toggle="modal" onclick=viewUser("' +
                    //     id +
                    //     '")><i class="fa fa-edit" data-toggle="tooltip"></i></a>';
                    tr +=
                        '<a href="#deleteUserModal" class="m-1 btn btn-danger" data-toggle="modal" onclick=$("#delete_id").val("' +
                        id +
                        '")><i class="fa fa-trash" data-toggle="tooltip"></i></a>';
                    tr += '</div></td>';
                    tr += '</tr>';
                    sn++;
                }
                //$('.loading').hide();
                $('#user_data').html(tr);
            }
        });
    }
</script>
<!-- add -->
<!-- <script>
    function addUser() {
        var name = $('.add_user #name').val();
        var role = $('.add_user #role').val();
        var email = $('.add_user #email').val();
        var password = $('.add_user #password').val();
        var status = $('.add_user #status').val();

        $.ajax({
            type: 'post',
            data: {
                name: name,
                role: role,
                email: email,
                password: password,
                status: status,
            },
            url: "./user/user_add.php",
            success: function(data) {
                var response = JSON.parse(data);
                $('#addUserModal').modal('hide');
                userList();
                alert(response.message);
            }

        })
    }
</script> -->
<!-- edit -->
<script>
    function editUser() {
            var name = $('.edit_user #name').val();
            var role = $('.edit_user #role').val();
            var email = $('.edit_user #email').val();
            var password = $('.edit_user #password').val();
            var status = $('.edit_user #status').val();
            var u_id = $('.edit_user #u_id').val();

            $.ajax({
                type: 'post',
                data: {
                    name: name,
                    role: role,
                    email: email,
                    password: password,
                    status: status,
                    u_id: u_id,
                },
                url: "./user/user_edit.php",
                success: function(data) {
                    var response = JSON.parse(data);
                    $('#editUserModal').modal('hide');
                    userList();
                    alert(response.message);
                }
            })
        }
</script>
<!-- view -->
<script>
      function viewUser(ID = 2) {
            $.ajax({
                type: 'get',
                data: {
                    id: ID,
                },
                url: "./user/user_view.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    $('.edit_user #name').val(response.name);
                    $('.edit_user #role').val(response.role);
                    $('.edit_user #email').val(response.email);
                    $('.edit_user #password').val(response.password);
                    $('.edit_user #status').val(response.status);
                    
                    $('.edit_user #u_id').val(response.user_id);
                    
                    $('.view_user #name').val(response.name);
                    $('.view_user #role').val(response.role);
                    $('.view_user #email').val(response.email);
                    $('.view_user #password').val(response.password);
                    $('.view_user #status').val(response.status);
                }
            })
        }
</script>
<!-- delete -->
<script>
    function deleteUser() {
        var id = $('#delete_id').val();
        $('#deleteUserModal').modal('hide');
        $.ajax({
            type: 'get',
            data: {
                id: id,
            },
            url: "./user/user_delete.php",
            success: function(data) {
                var response = JSON.parse(data);
                userList();
                alert(response.message);
            }
        })
    }
</script>