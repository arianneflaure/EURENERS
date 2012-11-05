<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/menus.class.php';

$C = new CamerticConfig;
$p = new menus;
if(isset($_POST['identificador']))
	$p->updateMenu($_POST);
else
	$p->saveMenu($_POST);


?>