<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Model {

	public function addProductActionData( $product_name , $product_price , $creation_date)	{
	    	$sql = "INSERT INTO `tbl_product`( `name`, `price`, `created_by`, `creation_date`) 
				VALUES ('$product_name' ,  $product_price , 1, '$creation_date' )";
			return  $this->db->query($sql)	;					
	}
		
	public function productTableData()	{
	    	$sql = "select `product_id`,`name`  `product_name`,
			`price`  `product_price`  from `tbl_product` order by product_id desc";
			return $this->db->query($sql)	;					
	}
	
	
}

/* End of file zone.php */
/* Location: ./application/models/zone.php */