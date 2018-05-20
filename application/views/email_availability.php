<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Webslesson | <?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container" width="600px">
        <h3 align="center"><?php echo $title; ?></h3>
        <div class="form-group">
            <label for="">Enter Email</label>
            <input type="text" name="email" id="email" class="form-control">
            <span id="email_result"></span>
        </div>
        <div class="form-group">
            <label for="">Enter Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
    </div>

    <script src="/js/jquery-3.1.1.min.js"></script>
    <script>
    
    $(document).ready(function(){
        $("#email").change(function(e){
            var email = $("#email").val();
            if(email){
                $.ajax({
                    url: "<?php echo base_url()?>main/check_email_availability",
                    method: "POST",
                    data: {email: email},
                    success: function(data){
                        $("#email_result").html(data);
                    }
                });
            }
        });
    });

    </script>
</body>
</html>