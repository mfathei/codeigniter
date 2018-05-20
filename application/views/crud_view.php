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
            var dataTables = $("#user_data").DataTable({
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
        });
    </script>
</body>
</html>
