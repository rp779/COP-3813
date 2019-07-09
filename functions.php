<?php
function currencyConverter($from_Currency,$to_Currency,$amount) {	
	$from_Currency = urlencode($from_Currency);
	$to_Currency = urlencode($to_Currency);	
	$get = file_get_contents("http://data.fixer.io/api/latest?access_key=bced2c317d7af14e2689951d2a09bb50");
	
	//file_put_contents('file.txt', $get); //Used to see the JSON Object that was returned. (Helped in Debugging)

	$rates = json_decode($get);
	//echo $rates->rates->$from_Currency;
	$euros = $amount/$rates->rates->$from_Currency;
	$converted_amount = $rates->rates->$to_Currency * $euros;
	
	
	//file_put_contents('stuff.txt',$rates->rates->$from_Currency);


	$data = array( 'rate' => 0, 'converted_amount' =>$converted_amount, 'from_Currency' => strtoupper($from_Currency), 'to_Currency' => strtoupper($to_Currency));
	//echo json_encode( $data );	
	
	return json_encode($data);
}
?> 