<?php
//Test Connection
require_once("isdk.php");	
$app = new iSDK;

if( $app->cfgCon("kf342")){ 

	$WebsiteOrderID = $_REQUEST['WebsiteOrderID'];
	$PaymentType = $_REQUEST['PaymentType'];
	$DateofPayment = $_REQUEST['DateofPayment'];
	$Description = $_REQUEST['Description']; 
	$PaymentAmount = (double)$PaymentAmount = $_REQUEST['PaymentAmount'];
	$pDate = $app->infuDate($DateofPayment);
	
	//Get the invoice id 
	$returnFields = array('Id');
	$getinfo = $app->dsFind('Job',1,0,'_WebsiteOrderID',$WebsiteOrderID,$returnFields);
	
	//Get the invoice ID
	foreach($getinfo as $getinfos=>$key){
		foreach($key as $invoice){
			$invoice_id = $invoice;
		}
	}
	echo $invoice_id;
	
	 //put the data into the invoice custom fields
	$currentDate = date("d-m-Y");
	$pDate = $app->infuDate($currentDate);
	$result = $app->manualPmt($invoice_id,$PaymentAmount,$pDate,$PaymentType,$Description,false);
	
	echo $result;
	 
}   
?>