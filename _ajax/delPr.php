<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/productos_finales.class.php';

$C = new CamerticConfig;
$p = new productos_finales; 
$p->delRecord($_POST);
?>