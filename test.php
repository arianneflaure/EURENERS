<?php
error_reporting(~0);
ini_set('display_errors', 1);

include('classes.php');
//$string = 'http://smsplus3.routesms.com:8080/bulksms/bulksms?username=duoex&password=27fevrie&type=0&dlr=1&destination=23799124249&source=Seductor&message=hello';


//Call The Constructor.
	$obj = new Sender("smsplus3.routesms.com","8080","duoex","27fevrie","Tester","Macabo","23799124249","0","1");
	$obj->Submit();
	//echo "<pre>";
	//var_dump($arrResponse);
?>