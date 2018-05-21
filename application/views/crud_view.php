<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Webslesson | <?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/DataTables/dataTables.bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .box {
            width: 900px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container box">
        <h3 align="center"><?php echo $title; ?></h3>
        <div class="table-responsive">
            <br>
            <button data-toggle="modal" data-target="#userModal" 
            class="btn btn-info btn-lg">Add</button>
            <br><br>
            <table id="user_data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10%">Image</th>
                        <th width="35%">First Name</th>
                        <th width="35%">Last Name</th>
                        <th width="10%">Edit</th>
                        <th width="10%">Delete</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/DataTables/jquery.dataTables.min.js"></script>
    <script src="/js/DataTables/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            var dataTable = $("#user_data").DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?php echo base_url()?>crud/fetch_user",
                    type: "POST"
                },
                "columnDefs": [
                    {
                        targets: [0, 3, 4],
                        orderable: false
                    }
                ]
            });

            $(document).on("submit", "#user_form", function(event){
                event.preventDefault();
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var extension = $("#user_image").val().split(".").pop().toLowerCase();
                if(jQuery.inArray(extension, ['jpg', 'jpeg', 'png', 'gif']) == -1){
                    alert("Invalid Image File");
                    $("#user_image").val('');
                    return false;
                }

                if(first_name != "" && last_name != ""){
                    $.ajax({
                        url: "<?php echo base_url() . 'crud/user_action'; ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(data){
                            alert(data);
                            $("#user_form")[0].reset();
                            $("#userModal").modal("hide");
                            dataTable.ajax.reload();
                        }
                    });
                } else {
                    alert("Both Fields are Required");
                }
            });

            $(document).on("click", ".update", function(event){
                var user_id = $(this).attr("id");
                $.ajax({
                    url: "<?php echo base_url() . 'crud/fetch_single_user'; ?>",
                    method: "POST",
                    data: {user_id: user_id},
                    dataType: "json",
                    success: function(data){
                        $("#userModal").modal("show");
                        $("#first_name").val(data.first_name);
                        $("#last_name").val(data.last_name);
                        $(".modal-title").text("Edit User");
                        $("#user_id").val(user_id);
                        $(".user_uploaded_image").html(data.user_image);
                        $("#action").val("Edit");
                        $("#buttn").val("Edit");
                    }
                });
            });

            $(document).on("click", ".delete", function(event){
                var user_id = $(this).attr("id");
                if(confirm("Are you sure you want to delete this?")){
                    $.ajax({
                        url: "<?php echo base_url() . 'crud/delete_single_user'; ?>",
                        method: "POST",
                        data: {user_id: user_id},
                        success: function(data){
                            dataTable.ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            });
        });
    </script>
</body>
</html>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <label for="first_name">Enter First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name">
                    <br>
                    <label for="last_name">Enter Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                    <br>
                    <label for="user_image">Select User Image</label>
                    <input type="file" id="user_image" name="user_image">
                    <span class="user_uploaded_image"></span>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" id="action" name="action" value="Add">
                    <input type="submit" id="buttn" value="Add" class="btn btn-success">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>