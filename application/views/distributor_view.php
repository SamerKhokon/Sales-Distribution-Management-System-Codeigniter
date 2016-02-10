<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Distributor</title>
	
	<?php    $this->load->view('library');    ?>
	
    <script>
        $(document).ready(function() {
		
		    $("#zone_id").load("http://localhost/cis/index.php/distributor/loadZoneComboBox" , function(){});
		    $("#table_distributor").load("http://localhost/cis/index.php/distributor/load_table_data" , function(){});

            $('#distributor_btn').click(function(){
			   var  distributor_name  = $('#distributor_name').val();
			   var  zone_id = $('#zone_id').val();
			   var  address = $('#address').val();
			   var  phone = $('#phone').val();
			   var  dataStr = "distributor_name="+distributor_name+"&zone_id="+zone_id+"&address="+address
					  +"&phone="+phone;
					  
				 
				if(distributor_name=="") {
				   alert('Enter distributor name');
				   $('#distributor_name').focus();
				   return false;
				}else{
				   $.ajax({
				      type:"post" ,
					  url: "http://localhost/cis/index.php/distributor/addDistributorAction/" ,
					  data:		dataStr ,
					  async:true ,
						success:function(st){ 
						    alert(st);
							//'data saved successfully'
							$("#zone_id").load("http://localhost/cis/index.php/distributor/loadZoneComboBox" , function(){});
							$("#table_distributor").load("http://localhost/cis/index.php/distributor/load_table_data" , function(){});
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
					$this->load->view('input_form/distributor'); 
		    ?>
        </div>
         <!-- /#wrapper -->
 </div>

 </body>
</html>
