<?php

$host = "hefesto.masbytes.es";
$user = "eureners";
$pass = "CMTeur2012";
$db = 'eureners_cimanti';

$con = mysql_connect($host, $user, $pass) or die('cant connect to mysql server');
echo 'Connected!';
mysql_select_db('eureners_cimanti') or die('Cant select database' . mysql_error());
echo 'Database selected!';

?>