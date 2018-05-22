<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <br><br>
        <div class="col-md-6 col-lg-6">
            <h3 align="center">CodeIgniter Shopping Cart with Ajax jQuery</h3>
            <br>
            <?php
                foreach ($product as $row) {
                    echo '
                        <div class="col-md-4" style="padding:16px;background-color:#f1f1f1;border:1px solid #ccc;margin-bottom:16px;height:300px" align="center">
                        <img src="'.base_url().'images/'.$row->product_image.'" class="img-thumbnail img-responsive" width="150" height="200"/><br/>
                        <h4>'.$row->product_name.'</h4>
                        <h3 class="text-danger">'.$row->product_price.'</h3>
                        <input class="form-control" type="text" name="quantity" class="quantity" id="'.$row->product_id.'" /><br/>
                        <button type="button" name="add_cart" class="btn btn-success add_cart" data-productname="'.$row->product_name.'" data-price="'.$row->product_price.'" data-productid="'.$row->product_id.'" >Add to Cart</button>
                        </div>
                    ';
                }
            ?>
        </div>
        <div class="col-md-6 col-lg-6">
            <div id="cart_details">
                <h3 align="center">Cart is Empty</h3>
            </div>
        </div>
    </div>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".add_cart").click(function(){
                var product_id = $(this).data("productid");
                var product_name = $(this).data("productname");
                var product_price = $(this).data("price");
                var quantity = $("#"+product_id).val();
                if(quantity != '' && quantity > 0){
                    $.ajax({
                        url: "<?php echo base_url() .'shopping_cart/add'?>",
                        method: "POST",
                        data: {
                            product_id: product_id,
                            product_name: product_name,
                            product_price: product_price,
                            quantity: quantity
                        },
                        success: function(data){
                            alert("Product added into Cart");
                            $("#cart_details").html(data);
                            $("#"+product_id).val('');
                        }
                    });
                } else {
                    alert("Please Enter Quantity");
                    return false;
                }

            });

            $("#cart_details").load("<?php echo base_url() .'shopping_cart/load'; ?>");

            $(document).on('click', '.remove_inventory', function(){
                var rowid = $(this).attr("id");
                if(confirm("Are you sure you want to remove this?")){
                    $.ajax({
                        url: "<?php echo base_url().'shopping_cart/remove'?>",
                        method: "POST",
                        data: {rowid: rowid},
                        success: function(data){
                            alert("Product removed from card");
                            $("#cart_details").html(data);
                        }
                    });
                } else {
                    return false;
                }
            });

            $(document).on('click', '#clear_cart', function(){
                if(confirm("Are you sure you want to clear cart?")){
                    $.ajax({
                        url: "<?php echo base_url().'shopping_cart/clear'?>",
                        method: "POST",
                        success: function(data){
                            alert("Your card has been clear...");
                            $("#cart_details").html(data);
                        }
                    });
                } else {
                    return false;
                }
            });
        });
    </script>
</body>
</html>