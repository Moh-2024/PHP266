<?php

require_once "./account.php";
 
class SavingsAccount extends Account 
{

	public function withdrawal($amount) 
	{
		if ($this->balance - $amount >= 0) {
			$this->balance -= $amount;
			return true;
		} else {
			return false;  // Insufficient funds, cannot go negative
		}
	} //end withdrawal

	public function getAccountDetails() 
	{
		$accountDetails = "<h2>Savings Account</h2>";
		$accountDetails .= parent::getAccountDetails();
		
		return $accountDetails;
	} //end getAccountDetails
	
} // end Savings
    
