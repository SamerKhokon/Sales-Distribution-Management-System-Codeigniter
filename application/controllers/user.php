<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

	public function index()
	{
		$this->load->view('user_view');
	}
	
	public function addUserAction() {	   
	    $user_name = trim($this->input->post('user_name'));
		$user_pass   = trim($this->input->post('user_pass'));
		$user_type   = trim($this->input->post('user_type'));
		$creation_date = date('Y-m-d h:i:s');
		
		$this->load->model('users');
	    echo $this->users->addUserActionData($user_name ,	$user_pass , $user_type , $creation_date);
	}
	
	
	
	public function load_table_data() {
	       $this->load->model('users');
			$users_data = $this->users->userTableData();
			?>
			   <script type="text/javascript">
			   $(function(){
			      $('#users_data_table').dataTable();
			   });
			   </script>
			  <table id="users_data_table" class="table table-striped table-bordered table-hover" >
                  	<thead>
                            <tr>
                                <th>User Name</th>
								<th>User Type</th>
								<th>Creation Date</th>
                            </tr>
                            </thead>
							<tbody>
							<?php   foreach($users_data->result() as $u) {  ?>
									<tr class="odd gradeX">
										<td><?= $u->user_name;?></td>
										<td><?=  $u->user_type;?> </td>
										<td><?=  $u->creation_date;?> </td>										
									</tr>
                            <?php } ?>
                            </tbody>
			      </table>					
	<?php 		
	}	
	
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */