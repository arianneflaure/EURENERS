<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/empresa_unidades_funcionales.class.php';

$C = new CamerticConfig;
$p = new empresa_unidades_funcionales; 
$p->update($_POST);
?>