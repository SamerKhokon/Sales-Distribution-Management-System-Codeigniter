<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>User</title>
	
	<?php    $this->load->view('library');    ?>
	
    <script>
        $(document).ready(function() {

			$("#table_user").load("http://localhost/cis/index.php/user/load_table_data/" , function(){});	

            $('#user_btn').click(function(){
                var   user_name = $('#user_name').val();
				var   user_pass   = $('#user_pass').val();
				var   user_type   = $('#user_type').val();				
                var  dataStr  = "user_name="+user_name+ 
				"&user_pass="+user_pass+ "&user_type="+user_type;
				
				if(user_name=="") {
				    alert("Please enter user name");
					$("#user_name").focus();
				   return  false;
				}else 	if(user_pass=="") {
				    alert("Please enter user password");
					$("#user_pass").focus();
				   return  false;
				}else if(user_type =="") {
				    alert("Please enter user type");
					$("#user_type").focus();
				   return  false;				
				}else {
				      $.ajax({
					    type:"post" ,
						url:"http://localhost/cis/index.php/user/addUserAction/" ,
						data: dataStr ,
						async: true ,
                        success:function(st) { 
						   alert(st);
						   $("#table_user").load("http://localhost/cis/index.php/user/load_table_data/" , function(){});
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
					$this->load->view('input_form/user'); 
		    ?>
        </div>
         <!-- /#wrapper -->
 </div>

 </body>
</html>
