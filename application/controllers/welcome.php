<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * A simple app that displays the minimum number of coins required to make change for any given value
	 * accepts multiple formats
	 */
	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		
		$data = array();
		$data['original_value'] = null;
		
		//coin values and labels
		$coin_decimals = array(200,100,50,20,2,1);
		$coin_strings = array('Two Pound','One Pound','Fifty Pence','Twenty Pence','Five Pence,','Two Pence','One Pence');
			
		//set validation rules
		//see libraries/
		$this->form_validation->set_rules('total', 'total', 'trim|required|valid_coin_value|xss_clean');
		
		//if our input is valid, proceed with generating results
		if ($this->form_validation->run() == TRUE)
		{
			$goal = $this->input->post('total');
			$remaining_change = $goal;
			
			//used to display total and input field value.
			$data['original_value'] = number_format($this->input->post('total')/100,2);
			
			//calculate our required coin values
			foreach($coin_decimals as $key=>$coin_type)
			{
				//how many of these coins can we fit into our remaining total?				
				$coin_total = floor($remaining_change/$coin_type);
				
				//remove this value from our remaining total
				$remaining_change -=  $coin_total*$coin_type;
				
				//add this coin total to our results array
				$coins[$coin_strings[$key]] = $coin_total;
			}
			
			$data['result'] = array(
									'coins'			=>	$coins,
				);
			
		}
		
		$this->load->view('home',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */