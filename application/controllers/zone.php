<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zone extends CI_Controller {

	public function index()
	{
	        $this->load->model('zones');
			$datas = $this->zones->zoneTableData();
			$data['zones_data'] = $datas;
		    $this->load->vars($data);
			$this->load->view('zone_view');
	}
		
		
	public function zoneComboBox() {
	    $this->load->model('zones');     
		$zones = $this->zones->zoneForComboData();
		
		$options = "";
		foreach($zones->result() as $zone) {
		     $options .= "<option value='".  $zone->zone_id ."'>".   $zone->zone_name . "</option>";
		}
		echo $options;
	}
		
		
		
	public function load_table_data() {
	       $this->load->model('zones');
			$zones_data = $this->zones->zoneTableData();
			?>
			   <script type="text/javascript">
			   $(function(){
			      $('#zone_data_table').dataTable();
			   });
			   </script>
			  <table id="zone_data_table" class="table table-striped table-bordered table-hover" >
                  			  <thead>
                            <tr>
                                <th>Zone</th>
                                <th>Creation Time</th>                               
                            </tr>
                            </thead>
							<tbody>
							<?php 
							  foreach($zones_data->result() as $z) {  ?>
                            <tr class="odd gradeX">
                                <td><?= $z->zone_name;?></td>
                                <td><?=  $z->creation_date;?> </td>
                            </tr>
                            <?php } ?>
                            </tbody>
			      </table>					
	<?php 		
	}	
		
		
	public function addZoneAction()	{
	    $zone_name = trim($this->input->post('zone_name')) ;		
		$creation_date = date('Y-m-d h:i:s');
		$this->load->model('zones');
		$this->zones->addZoneActionData($zone_name,$creation_date);
		//$data['zones_data'] = $datas;
		//$this->load->vars($data);
		echo 1;
	}



	
}

/* End of file zone.php */
/* Location: ./application/controllers/zone.php */