<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributor extends CI_Controller {
	
	public function index()
	{
		$this->load->view('distributor_view');
	}
		
	public function addDistributorAction() {
	   
	    $zone_id = trim($this->input->post('zone_id'));
		$name     = trim($this->input->post('distributor_name'));
		$address = trim($this->input->post('address'));
		$phone    = trim($this->input->post('phone'));
		$creation_date = date('Y-m-d h:i:s');
		
		$this->load->model('distributors');
		echo $this->distributors->addDistributorActionData( $zone_id   , $name , $address , $phone , $creation_date);
		
	}
	
	
	public function loadZoneComboBox()
	{
		$this->load->model('zones');
		$zones = $this->zones->zoneForComboData();
		$options = "";
		foreach($zones->result() as $zone) {
		     $options .= "<option value='".  $zone->zone_id ."'>".   $zone->zone_name . "</option>";
		}
		echo $options;		
	}
	
	
	public function load_table_data() {
	       $this->load->model('distributors');
			$distributors_data = $this->distributors->distributorTableData();
			?>
			   <script type="text/javascript">
			   $(function(){
			      $('#distributors_data_table').dataTable();
			   });
			   </script>
			  <table id="distributors_data_table" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  			  <thead>
                            <tr>
                                <th>Distributor</th>
								<th>Address</th>
								<th>Phone</th>
                                <th>Zone</th>                               
                            </tr>
                            </thead>
							<tbody>
							<?php   foreach($distributors_data->result() as $d) {  ?>
									<tr class="odd gradeX">
										<td><?= $d->distributor_name;?></td>
										<td><?=  $d->address;?> </td>
										<td><?= $d->phone;?></td>
										<td><?=  $d->zone_name;?> </td>
									</tr>
                            <?php } ?>
                            </tbody>
			      </table>					
	<?php 		
	}	
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */