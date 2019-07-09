<?php 
include_once("functions.php");
if(isset($_POST['convert'])) {
	$from_currency = trim($_POST['from_currency']);
	$to_currency = trim($_POST['to_currency']);
	$amount = trim($_POST['amount']);	
	if($from_currency == $to_currency) {
	 	$data = array('error' => '1');
		echo json_encode( $data );	
		exit;
	}
	$converted_currency=currencyConverter($from_currency, $to_currency, $amount);
	// Print outout
	echo $converted_currency;

	//file_put_contents('converted_currency.txt', $converted_currency);

	
}
?>