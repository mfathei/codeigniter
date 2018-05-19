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
        <br><br><br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                <?php
                    if($fetch_data->num_rows() > 0){
                        foreach($fetch_data->result() as $row){
                        ?>
                            <tr>
                                <td><?php echo $row->id ?></td>
                                <td><?php echo $row->first_name ?></td>
                                <td><?php echo $row->last_name ?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        echo '<tr><td colspan="3">No Data Found</td></tr>';
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>