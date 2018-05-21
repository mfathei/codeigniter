<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
                Ajax Pagination
            </title>
            <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        </meta>
    </head>
    <body>
        <div class="container box">
            <h3 align="center">
                Ajax jQuery Pagination in CodeIgniter using Bootstrap
            </h3>
            <div id="pagination_link">
            </div>
            <div class="table-responsive" id="country_table">
            </div>
        </div>
        <script src="/js/jquery-3.1.1.min.js">
        </script>
        <script src="/js/bootstrap.min.js">
        </script>
        <script>
            $(document).ready(function(){

                function load_country_data(page){
                    $.ajax({
                        url: "<?php echo base_url() . 'ajax_pagination/pagination/'?>"+ page,
                        method: "GET",
                        dataType: "json",
                        success: function(data){
                            $("#country_table").html(data.country_table);
                            $("#pagination_link").html(data.pagination_link);
                        }
                    });
                }

                load_country_data(1);

                $(document).on('click', '.pagination li a', function(event){
                    event.preventDefault();
                    var page = $(this).data("ci-pagination-page");
                    load_country_data(page);
                });

            });
        </script>
    </body>
</html>
