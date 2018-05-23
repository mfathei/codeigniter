<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dompdf with CodeIgniter</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <br>
        <h3 align="center">Convert HTML to pdf in CodeIgniter using DOMPdf</h3>
        <br>
        <?php

        if(isset($customer_data)){
            ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>View</th>
                        <th>PDF</th>
                    </tr>
                    <?php
                    foreach ($customer_data->result() as $row) {
                        echo '
                        <tr>
                            <td>'.$row->id.'</td>
                            <td>'.$row->first_name.'</td>
                            <td>'.$row->last_name.'</td>
                            <td><a href="'.base_url().'htmltopdf/details/'.$row->id.'">View</a></td>
                            <td><a href="'.base_url().'htmltopdf/pdfdetails/'.$row->id.'">View PDF</a></td>
                        </tr>
                        ';
                    }
                    ?>
                </table>
            </div>
            <?php
        }
        if(isset($customer_details)){
            echo $customer_details;
        }
        ?>
    </div>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>