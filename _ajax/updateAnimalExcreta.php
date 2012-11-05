<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/provincias_animales_excreta.class.php';

$C = new CamerticConfig;
$p = new provincias_animales_excreta; 
$p->update($_POST);
?>