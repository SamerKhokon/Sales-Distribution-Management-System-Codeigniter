<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Model {

	public function userLoginCheckActionData($user_name ,	$user_pass )	{
	    	$sql = "SELECT  u.*,count(*)  `counter`  FROM  `tbl_user`  u 
								WHERE `user_name`='$user_name' 
								and `pass` ='$user_pass'  LIMIT 1";								
			$res = 	$this->db->query($sql)->result();				
			return   $res;
	}
		
	
}

/* End of file user.php */
/* Location: ./application/models/user.php */