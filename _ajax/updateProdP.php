<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/empresa_procesos_producto_final.class.php';

$C = new CamerticConfig;
$p = new empresa_procesos_producto_final; 
//var_dump($_POST); die;
$p->update($_POST);
?>