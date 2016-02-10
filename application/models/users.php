<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {

	public function addUserActionData($user_name ,
													$user_pass , $user_type , $creation_date)	{
	    	$sql = "INSERT INTO `tbl_user`( `user_name`, `pass`, `user_type`, `user_status`, `creation_date`)
			VALUES ('$user_name','$user_pass' ,'$user_type',1, '$creation_date' )";
			return $sql; 
			//$this->db->query($sql)	;					
	}
		
	public function userTableData()	{
	    	$sql = "SELECT `user_id`, `user_name`, `pass`, `user_type`, `user_status`, 
						DATE_FORMAT(`creation_date`,'%d-%m-%Y')  `creation_date` FROM `tbl_user` 
						ORDER BY user_id DESC"; 
			return $this->db->query($sql)	;					
	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */