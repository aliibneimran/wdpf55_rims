<?php require_once("./include/topmenu.php") ?>
<?php require_once("./include/leftmenu.php") ?>
<?php 
include('../connection/database.php');
$result = $db->query("SELECT * FROM message");
$row = $result->fetch_object();
?>

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
                        <h1>List Of Message</h1>
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
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="mail_data">
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
<!-- View Modal -->
<div id="viewMail" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body view_mail">
            <embed src="<?php echo $row->message ?>" id="message"  type="application/pdf" width="100%" height="400px" />
            <input type="hidden" id="mail">
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Close" onclick="viewMail()">
            </div>
        </div>
    </div>
</div>
<?php require_once("./include/footer.php") ?>

<!-- display -->
<script>
    $(document).ready(function() {
        mailList();

    });

    function mailList() {
        $.ajax({
            type: 'get',
            url: "./mail/mail_list.php",
            success: function(data) {
                var response = JSON.parse(data);
                console.log(response);
                var tr = '';
                var sn = 1;
                for (var i = 0; i < response.length; i++) {
                    var id = response[i].message_id;
                    var name = response[i].name;
                    var email = response[i].email;
                    var subject = response[i].subject;
                    var message = response[i].message;
                    tr += '<tr>';
                    tr += '<td>' + sn + '</td>';
                    tr += '<td>' + name + '</td>';
                    tr += '<td>' + email + '</td>';
                    tr += '<td>' + subject + '</td>';
                    tr += '<td>' + '<a href="#viewMail" class="m-1 btn btn-primary" data-toggle="modal" onclick=viewMail("' + id + '")><i class="fa fa-eye" data-toggle="tooltip"></i></a>' + '</td>';
                    tr += '<td>' + '<a href="#deleteVacancyModal" class="m-1 btn btn-danger" data-toggle="modal" onclick=$("#delete_id").val("' + id + '")><i class="fa fa-trash" data-toggle="tooltip"></i></a>' + '</td>';
                    tr += '</tr>';
                    sn++;
                }
                //$('.loading').hide();
                $('#mail_data').html(tr);
            }
        });
    }
</script>
<script>
    function viewMail(ID = 2) {
        $.ajax({
            type: 'get',
            data: {
                id: ID,
            },
            url: "./mail/mail_view.php",
            success: function(data) {
                var response = JSON.parse(data);
                $('.view_mail #mail').val(response.message_id);

                $('.view_mail #name').val(response.name);
                $('.view_mail #email').val(response.email);
                $('.view_mail #subject').val(response.subject);
                $('.view_mail #message').val(response.message);
            }
        })
    }
</script>