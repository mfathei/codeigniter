<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Data using CodeIgniter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <br><br><br>
        <h3 align="center">Insert Data using CodeIgniter</h3>
        <form method="post" action="<?php echo base_url() ?>main/form_validation">
            <?php 
                if($this->uri->segment(2) == 'inserted'){
                    echo '<p class="text-success">Data Inserted</p>';
                }
            ?>
            <div class="form-group">
                <label for="first_name">Enter First Name</label>
                <input class="form-control" type="text" name="first_name" id="first_name">
                <span class="text-danger"><?php echo form_error("first_name")?></span>
            </div>
            <div class="form-group">
                <label for="last_name">Enter Last Name</label>
                <input class="form-control" type="text" name="last_name" id="last_name">
                <span class="text-danger"><?php echo form_error("last_name")?></span>
            </div>
            <div class="form-group">
                <input class="btn btn-info" type="submit" value="Insert" name="insert">
            </div>
        </form>
    </div>

</body>
</html>