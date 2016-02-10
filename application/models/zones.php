<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zones extends CI_Model {

	public function addZoneActionData($zone_name , $creation_date)	{
	    		$sql = "INSERT INTO `tbl_zone`
									( `zone_name`, `creation_date`, `created_by`) 
									VALUES ('$zone_name' ,'$creation_date',1)";
			return $this->db->query($sql)	;					
	}
		
	public function zoneTableData()	{
	    	$sql = "select * from `tbl_zone` order by zone_id desc";
			return $this->db->query($sql)	;					
	}
	
	public function zoneForComboData() {
	     $sql = "select `zone_id`,`zone_name`
						from `tbl_zone` order by zone_name asc";
		return $this->db->query($sql);				
	}
	
	
	
	
	
	
}

/* End of file zone.php */
/* Location: ./application/models/zone.php */