<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/labores.class.php';

$C = new CamerticConfig;
$p = new labores; 
$fielstoexclude = array('maquinaria', 'nombrem');
$p->saveRecord($_POST, $fielstoexclude);
$id = (int) $p->lastId();
echo $id;
?>