<?php

/* 
 * Extending the form validation class to add our own validation rule
 */

class MY_Form_validation extends CI_Form_validation {
	 public function __construct()
    {
        parent::__construct();
		$this->CI =& get_instance();
    }
	public function valid_coin_value($str)
	{
		//check the string they have entered is in a correct format, and return the value as pennies.		
		
		//grab first and last characters,to work out what values we are dealing with
		$start  = substr($str,1);
		$end = substr($str,-1);
		//now trim off any potential non-numerical values
		$value = trim($str,"£p");
		
		//we should now be left with a numeric value, either whole or with a decimal, if the input is correct
		if(!is_numeric($value))
		{
			$this->CI->form_validation->set_message('valid_coin_value', 'The value you have entered is invalid');
			return FALSE;
		}
		
		//proceed to convert the value into pennies
		
		if($start=='£' || ($start!='£' && $end!='p'))
		{
			//if our number starts with a pound sign, we know to multiple by 100, simples.
			//if no symbols are present, then it is also a pound value
			
			//take the value and round it to the correct length
			$value = round($value,2);
		
			$total = $value*100;
		}
		else
		{
			//if there is no pound sign, we have to work out if this is pennies or pounds, look for a decimal point			
			if(strpos($value, '.') !== FALSE)
			{
				//this is a value in pounds
				//round it to the correct length
				$value = round($value,2);
				//convert value to pennies
				$total = $value*100;
			}
			else
			{
				$total = $value;
			}
		}
		
		return $total;
		
	}
}