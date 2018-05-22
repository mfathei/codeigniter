<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Export data to excel in CodeIgniter using PHPExcel</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container box">
        <br><br>
        <h3 align="center">Export data to excel in CodeIgniter using PHPExcel</h3>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Country</th>
                    <th>Provice</th>
                    <th>City</th>
                </tr>
                <?php
                foreach($city_data as $row){
                    echo '
                    <tr>
                        <td>'.$row->id.'</td>
                        <td>'.$row->country.'</td>
                        <td>'.$row->province.'</td>
                        <td>'.$row->city.'</td>
                    </tr>
                    ';
                }
                ?>
            </table>
            <div align="right">
                <form action="<?php echo base_url() . 'excel_export/action'?>" method="post">
                    <input type="submit" name="export" class="btn btn-success" value="Export">
                </form>
                <br><br><br>
            </div>
        </div>
    </div>
</body>
</html>