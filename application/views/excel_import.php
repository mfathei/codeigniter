<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Import Excel Data into MySQL using CodeIgniter and PHPExcel</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <br>
        <h3 align="center">Import Excel Data into MySQL using CodeIgniter and PHPExcel</h3>
        <br>
        <form method="post" id="import_form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Select Excel File</label>
                <input type="file" name="file" id="file" accept=".xls, .xlsx" required>
            </div>
            <input type="submit" name="import" value="Import" class="btn btn-info">
        </form>
        
        <br>
        <div class="table-responsive" id="customer-data">
            
        </div>

    </div>


    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            function load_data(){
                $.ajax({
                    url: "<?php echo base_url() . 'excel_import/fetch'?>",
                    method: "POST",
                    success: function(data){
                        $("#customer-data").html(data);
                    }
                });
            }

            load_data();

            $("#import_form").on("submit", function(event){
                event.preventDefault();
                $.ajax({
                    url: "<?php echo base_url() .'excel_import/import'?>",
                    method: "POST",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        $("#file").val('');
                        load_data();
                        alert(data);
                    }
                });
            });

        });
    </script>
</body>
</html>