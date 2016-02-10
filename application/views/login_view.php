<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> User Login </title>
   <?php $this->load->view('library');  ?>
     
   <script type="text/javascript">
   $(function(){
            
			$("#login_btn").click(function(){
			    var  user_name = $("#user_name").val();
				var  user_pass   = $("#user_pass").val();
				var  dataStr       = "user_name="+user_name+"&user_pass="+user_pass;
				
				if(user_name == "" ) {
				   alert("Please enter username");
				   $("#user_name").focus();
				   return false;
				}else if( user_pass == "" ) {
				   alert("Please enter password");
				   $("#user_pass").focus();
				   return false;
				}else {
				     $.ajax({
					    type: "post" ,
						url: "http://localhost/cis/index.php/login/userLoginCheckAction/"		 ,
						data: dataStr ,
						async: true ,
						success:  function(st) { 
				
								if(st != 0 ) 
								location.href = "http://localhost/cis/index.php/dashboard/";
								else
								location.href = "http://localhost/cis/index.php/login/";
						}
					 });
				}				
			});
			
   });
   </script>
   
 </head>
 <body>


 
 
   <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">DMS Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" id="user_name" placeholder="User name" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="user_pass" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
								
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="javascript:void(0);" id="login_btn" class="btn btn-lg btn-success btn-block">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
     

 </body>
</html>
