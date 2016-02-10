<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->view('login_view');
	}
	
	
	public function userLoginCheckAction() {	   
	    $user_name = trim($this->input->post('user_name'));
		$user_pass   = trim($this->input->post('user_pass'));
		
		$this->load->model('logins');
	    $res = $this->logins->userLoginCheckActionData($user_name ,	$user_pass );
		
    		print  intval($res[0]->counter);		
			
	}
	
    public function logout() {	       
	?>
	<script type="text/javascript"> window.location= "http://localhost/cis/index.php/login/";</script>
	<?php 		
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */