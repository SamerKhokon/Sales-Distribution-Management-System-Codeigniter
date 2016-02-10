<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	
	public function index()
	{
		$this->load->view('product_view');
	}
	
	
	public function addProductAction() {	   
	    $product_name = trim($this->input->post('product_name'));
		$product_price     = trim($this->input->post('product_price'));
		$creation_date = date('Y-m-d h:i:s');
		$this->load->model('products');
	    echo $this->products->addProductActionData( $product_name , $product_price , $creation_date);
	}
	
	
	public function load_table_data() {
	       $this->load->model('products');
			$products_data = $this->products->productTableData();
			?>
			   <script type="text/javascript">
			   $(function(){
			      $('#products_data_table').dataTable();
			   });
			   </script>
			  <table id="products_data_table" class="table table-striped table-bordered table-hover" >
                  	<thead>
                            <tr>
                                <th>Product Name</th>
								<th>Price</th>
                            </tr>
                            </thead>
							<tbody>
							<?php   foreach($products_data->result() as $p) {  ?>
									<tr class="odd gradeX">
										<td><?= $p->product_name;?></td>
										<td><?=  $p->product_price;?> </td>
									</tr>
                            <?php } ?>
                            </tbody>
			      </table>					
	<?php 		
	}	
	
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */