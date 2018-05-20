<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Data using CodeIgniter</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <br><br><br>
        <h3 align="center">Insert Data using CodeIgniter</h3>
        <?php


            if(isset($single_data)){
                foreach($single_data->result() as $row){
                ?>
                        <form method="post" action="<?php echo base_url() ?>main/form_validation">
                            <?php 
                                if($this->uri->segment(2) == 'inserted'){
                                    echo '<p class="text-success">Data Inserted</p>';
                                }
                            ?>
                            <div class="form-group">
                                <label for="first_name">Enter First Name</label>
                                <input class="form-control" type="text" name="first_name" value="<?php echo $row->first_name; ?>" id="first_name">
                                <span class="text-danger"><?php echo form_error("first_name")?></span>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Enter Last Name</label>
                                <input class="form-control" type="text" name="last_name" value="<?php echo $row->last_name; ?>" id="last_name">
                                <span class="text-danger"><?php echo form_error("last_name")?></span>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>">
                                <input class="btn btn-info" type="submit" value="Update" name="update">
                            </div>
                        </form>
                    <?php
                }
            } else {

        ?>
        
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
        <?php } ?>
        <br><br><br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                <?php
                    if($fetch_data->num_rows() > 0){
                        foreach($fetch_data->result() as $row){
                        ?>
                            <tr>
                                <td><?php echo $row->id ?></td>
                                <td><?php echo $row->first_name ?></td>
                                <td><?php echo $row->last_name ?></td>
                                <td><a href="#" class="delete_data" id="<?php echo $row->id; ?>">Delete</a></td>
                                <td><a href="<?php echo base_url() . 'main/update_data/' . $row->id;?>">Edit</a></td>
                            </tr>
                        <?php
                        }
                    } else {
                        echo '<tr><td colspan="5">No Data Found</td></tr>';
                    }
                ?>
            </table>
        </div>
    </div>

    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".delete_data").click(function(event){
                var id = $(this).attr("id");
                if(confirm("Are you sure you want to delete this item?")){
                    window.location = "<?php echo base_url()?>main/delete_data/" + id;
                } else{
                    return false;
                }
            });
        });
    </script>
</body>
</html>