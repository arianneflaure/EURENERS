<?php
@session_start();
require_once 'config.php';
$C = new CamerticConfig;
$app = new eureners;
if($app->checkSession())
	header('location:dashboard.php');
else
	header('location:index.html');
?>