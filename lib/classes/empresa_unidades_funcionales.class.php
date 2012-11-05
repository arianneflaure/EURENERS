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

class empresa_unidades_funcionales extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getAllRecordsFromEmpresa($ide) {
		$req = "SELECT * FROM $this->table WHERE empresa = '$ide';";
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllProductsFromE() {
		$req = "SELECT a.producto_final AS identificador, b.nombre AS nombre FROM $this->table AS a LEFT JOIN productos_finales AS b ON b.identificador = a.producto_final WHERE a.empresa = '".$_SESSION['u']['enterprise']."';";
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
	
	public function getFinalProduct($id) {
		$req = "SELECT pf.unidad AS unidad FROM $this->table AS euf LEFT JOIN productos_finales AS pf ON pf.identificador = euf.producto_final WHERE euf.identificador = '".$id."' LIMIT 1";
		$res = $this->select($req);
		return $res[0];	
	}
	
	public function getRecordE($id, $ide){
		$req = "SELECT * FROM $this->table WHERE producto_final = '$id' AND empresa = '".$ide."' LIMIT 1";
		$res = $this->select($req);
		return $res[0];
	}
	
	public function update($updates, $table = null) {
		$table = is_null($table) ? $table = __CLASS__ : $table;
		$sql = $this->buildUpdateQueryWhere($updates, array('empresa' => $updates['empresa'], 'producto_final' => $updates['producto_final']), $table);
		//var_dump($sql); die;
		$this->sql($sql);
	}
	
	public function del($id, $id2) {
		$req = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM $this->table WHERE empresa = '".$id."' AND producto_final = '".$id2."';";
		//var_dump($req); die;
		$this->sql($req);
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