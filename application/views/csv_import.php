<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Import CSV file</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container box">
        <h3 align="center">Import CSV file into CodeIgniter and MySQL</h3>
        <br><br>
        <form method="post" id="import_csv" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Select CSV File</label>
                <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
            </div>
            <br>
            <button type="submit" name="import_csv" id="import_csv_btn" class="btn btn-info">Import CSV</button>
        </form>
        <br>
        <div id="imported_csv_data"></div>
    </div>
    
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
        function load_data(){
            $.ajax({
                url: "<?php echo base_url() . 'csv_import/load_data'?>",
                method: "POST",
                success: function(data){
                    $("#imported_csv_data").html(data);
                }
            });
        }

        load_data();

        $("#import_csv").on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url() . 'csv_import/import'?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $("#import_csv_btn").html("Importing...");
                },
                success: function(data){
                    $("#import_csv")[0].reset();
                    $("#import_csv_btn").attr("disabled", false);
                    $("#import_csv_btn").html("Import Done");
                    load_data();
                }

            });
        });

        });
    </script>
</body>
</html>