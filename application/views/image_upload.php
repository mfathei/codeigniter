<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Webslesson | <?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <br><br><br>
        <h3 align="center"><?php echo $title; ?></h3>
        <form method="post" id="upload_form" align="center" enctype="multipart/form-data">
            <input type="file" name="image_file" id="image_file">
            <input type="submit" name="upload" value="Upload" id="upload" calss="btn btn-info">
        </form>
        <br><br>
        <div id="uploaded_image">
            <?php echo $image_data; ?>
        </div>
    </div>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#upload_form").on("submit", function(e){
                e.preventDefault();
                if($("#image_file").val() == ''){
                    alert("Please select a file.");
                } else {
                    $.ajax({
                        url: "<?php echo base_url()?>main/ajax_upload",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data){
                            $("#uploaded_image").html(data);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>