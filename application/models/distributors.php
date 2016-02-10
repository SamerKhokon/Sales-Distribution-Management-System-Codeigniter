<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Distributors extends CI_Model     {

	public function addDistributorActionData( $zone_id   , $name , $address , $phone , $creation_date)	{	
	    $sql = "INSERT INTO `tbl_distributor`(`user_id`, `zone_id`,
								`name`, `address`, `phone`, `creation_date`, `created_by`) 
							VALUES (1,$zone_id,'$name','$address','$phone','$creation_date',1)";							
		return $this->db->query($sql);							
	}
		
	public function distributorTableData()	{	
	    	$sql = "SELECT d.`distributor_id`, 
						d.`user_id`, d.`zone_id`, d.`name` 	`distributor_name`	, d.`address`, d.`phone`, d.`creation_date`, 
						d.`created_by`,z.`zone_name` FROM `tbl_distributor` `d`
						left join `tbl_zone` `z` on d.`zone_id`=z.`zone_id` ";
						
			return $this->db->query($sql)	;					
	}
	
	public function zoneWiseDistributorData($zone_id)  {
	     $sql = "SELECT d.`distributor_id`,  d.`name`
									FROM 	   `tbl_distributor` `d` 
								where   d.`zone_id`=$zone_id";								
		return $this->db->query($sql);				
	}
		
}

/* End of file distributors.php */
/* Location: ./application/models/distributors.php */