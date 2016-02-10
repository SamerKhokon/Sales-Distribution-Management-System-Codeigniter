<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product</title>
	
	<?php    $this->load->view('library');    ?>
	
    <script>
        $(document).ready(function() {
     
			$("#table_product").load("http://localhost/cis/index.php/product/load_table_data" , function(){});

            $('#product_btn').click(function(){
                var  product_name = $('#product_name').val();
                var  product_price  = $('#product_price').val();
                var  dataStr = "product_name="+product_name+"&product_price="+product_price;
				
                if(product_name=="") {
                    alert('Please enter product name');
                    $('#product_name').focus();
                    return false;
                }else if(product_price=="") {
				    alert('Please enter product price');
                    $('#product_price').focus();
                    return false;
				}else{
				   
					$.ajax({
					    type: "post" ,
						url:  "http://localhost/cis/index.php/product/addProductAction"  ,
						data: dataStr ,
						async: true ,
						success:function(st){ 
                     			alert('data saved successfully');	 
						   		$("#table_product").load("http://localhost/cis/index.php/product/load_table_data" , function(){});           
						}
					});
			     }
            });


     
        });
    </script>
 </head>
 
 <body>


 <div id="wrapper">
        
		<?php $this->load->view('partial/navigation');  ?>
		
        <div id="page-wrapper">

            <?php
					$this->load->view('input_form/product'); 
		    ?>
        </div>
         <!-- /#wrapper -->
 </div>

 </body>
</html>
