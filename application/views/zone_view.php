<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>zone</title>
	
	<?php    $this->load->view('library');    ?>
	
    <script>
        $(document).ready(function() {
			$('#table_zone').load('http://localhost/cis/index.php/zone/load_table_data/',function(){});	

		    
		   
            $('#zone_submit_btn').click(function(){
                var zone_name = $('#zone_name').val();
                var zone_uri  = "http://localhost/cis/index.php/zone/addZoneAction/" ;

                if(zone_name=="") {
                    alert('Please enter zone name');
                    $('#zone_name').focus();
                    return false;
                }else{
                    $.ajax({
                        type:"post" ,
                        url: zone_uri ,
                        data: "zone_name="+zone_name ,
                        success:function(st)  {
                              alert('data saved successfully');	
							$('#table_zone').load('http://localhost/cis/index.php/zone/load_table_data/',function(){});	
							 $('#zone_name').val('');
							$('#zone_name').focus();							
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
					$this->load->view('input_form/zone'); 
		    ?>
        </div>
         <!-- /#wrapper -->
 </div>

 </body>
</html>
