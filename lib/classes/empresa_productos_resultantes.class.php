<?php
@session_start();
/**
 * Classe de gestion des provinces
 * @author 		Patient Assontia <assontia@gmail.com>
 * @package 	Camertic Framework
 * @since 		Version 1.0
 * @version		1.1
 * @copyright 	Copyright (c) 2012, Patient
 * @license		GNU General Public License
 */

class empresa_productos_resultantes extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getAllRecordsFromEmpresa($ide) {
		$req = "SELECT * FROM $this->table WHERE empresa = '$ide';";
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllProductsFromE() {
		$req = "SELECT a.producto AS identificador, b.nombre AS nombre FROM $this->table AS a LEFT JOIN productos AS b ON b.identificador = a.producto WHERE a.empresa = '".$_SESSION['u']['enterprise']."';";
		//var_dump($req); //die;
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllRecordsE() {
		$req = "SELECT * FROM $this->table WHERE empresa = '".$_SESSION['u']['enterprise']."'";
		//$motif = is_null($motif) ? "Displays the records for $this->table" : $motif;
		//if($track == false || ($track == false && is_null($motif)))
			$res = $this->select($req);
		//else
		//	$res = $this->select($req, $motif);
		return $res;
	}
	
	public function getTypeName($idT) {
		switch($idT) {
			case '1' : return 'Produccion Agricola'; break;
			case '2' : return 'Produccion Agricola'; break;
			case '3' : return 'Produccion Agricola'; break;
			case '4' : return 'Produccion Agricola'; break;
			case '5' : return 'Produccion Agricola'; break;
			default : return 'None';
		}
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>