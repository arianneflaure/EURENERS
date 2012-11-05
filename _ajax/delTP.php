<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/procesos_transformacion.class.php';

$C = new CamerticConfig;
$p = new procesos_transformacion; 
$p->delRecord($_POST);
?>