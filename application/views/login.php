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
        <form method="post" action="<?php echo base_url(). 'main/login_validation'?>">
            <div class="form-group">
                <label for="">Enter Username:</label>
                <input type="text" name="username" class="form-control">
                <span class="text-danger"><?php echo form_error("username"); ?></span>
            </div>
            <div class="form-group">
                <label for="">Enter Password:</label>
                <input type="password" name="password" class="form-control">
                <span class="text-danger"><?php echo form_error("password"); ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="insert" class="btn btn-info" value="Login">
                <span class="text-danger"><?php echo $this->session->flashdata("error")?></span>
            </div>
        </form>
    </div>
</body>
</html>