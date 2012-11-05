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

class provincias_animales_excreta extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getAllRecordsFromEmpresa($ide) {
		$req = "SELECT * FROM $this->table WHERE empresa = '$ide';";
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllRecordsFromAnimal($ida) {
		$req = "SELECT * FROM $this->table WHERE animal = '$ida';";
		//var_dump($req); exit;
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllRecordsP($ide) {
		$req = "SELECT * FROM $this->table WHERE provincia = '$ide';";
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
	
	public function getRecordE($id, $ide){
		$req = "SELECT * FROM $this->table WHERE animal = '$id' AND provincia = '".$ide."' LIMIT 1";
		$res = $this->select($req);
		return $res[0];
	}
	
	public function update($updates, $table = null) {
		$table = is_null($table) ? $table = __CLASS__ : $table;
		$sql = $this->buildUpdateQueryWhere($updates, array('provincia' => $updates['provincia'], 'animal' => $updates['animal']), $table);
		//var_dump($sql); die;
		$this->sql($sql);
	}
	
	public function del($id, $id2) {
		$req = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM $this->table WHERE animal = '".$id."' AND provincia = '".$id2."';";
		//var_dump($req); die;
		$this->sql($req);
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>