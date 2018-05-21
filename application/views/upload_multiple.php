<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uplad multiple files in CodeIgniter using jQuery</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <br><br><br>
        <h3 align="center">Uplad multiple files in CodeIgniter using jQuery</h3>
        <div class="col-md-6" align="right">
            <label for="">Select Multiple Files</label>
        </div>
        <div class="col-md-6">
            <input type="file" id="files" name="files" multiple>
        </div>
        <div style="clear:both">
            
        </div>
        <br><br>
        <div id="uploaded_images"></div>
    </div>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#files").change(function(e){
                var files = $("#files")[0].files;
                var error = '';
                var form_data = new FormData();
                for(var count = 0; count < files.length; count++){
                    var name = files[count].name;
                    var extension = name.split('.').pop().toLowerCase();
                    if(jQuery.inArray(extension, ['jpg', 'jpeg', 'png', 'gif']) == -1){
                        error += "Invalid " + count + " Image File";
                    } else {
                        form_data.append("files[]", files[count]);
                    }
                }

                if(error == ''){
                    $.ajax({
                        url: "<?php echo base_url() . 'upload_multiple/upload'?>",
                        method: "POST",
                        contentType: false,
                        processData: false,
                        cache: false,
                        data: form_data,
                        beforeSend: function(){
                            $("#uploaded_images").html('<label class="text-success">Uploading...</label>');
                        },
                        success: function(data){
                            $("#uploaded_images").html(data);
                            $("#files").val('');
                        }
                    });
                } else {
                    alert(error);
                }
            });
        });
    </script>
</body>
</html>