<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Email with Attachment in CodeIgniter</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <br><br><br>
        <h2 align="center">Live Data search in CodeIgniter using Ajax jQuery</h2>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" class="form-control"
                 placeholder="Search by city details">
            </div>
        </div>
        <div id="result"></div>
        <br>
    </div>
    <divstyle="clear:both"></div>
    <br>
    <br>
    <br>
    <br>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            function load_data(query){
                $.ajax({
                    url: "<?php echo base_url() . 'ajaxsearch/fetch'?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data){
                        $("#result").html(data);
                    }
                });
            }

            load_data();

            $("#search_text").keyup(function(){
                var search = $(this).val();
                if(search != ''){
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });
    </script>
</body>
</html>