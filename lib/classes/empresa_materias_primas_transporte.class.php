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

class empresa_materias_primas_transporte extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
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
	
	public function getAllRecordsEM($materia) {
		$req = "SELECT * FROM $this->table WHERE empresa = '".$_SESSION['u']['enterprise']."' AND materia = '".$materia."'";
		//$motif = is_null($motif) ? "Displays the records for $this->table" : $motif;
		//if($track == false || ($track == false && is_null($motif)))
			$res = $this->select($req);
		//else
		//	$res = $this->select($req, $motif);
		return $res;
	}
	
	public function update($updates, $table = null) {
		$table = is_null($table) ? $table = __CLASS__ : $table;
		$sql = $this->buildUpdateQueryWhere($updates, array('empresa' => $_SESSION['u']['enterprise'], 'materia_prima' => $updates['materia_prima']), $table);
		//var_dump($sql); die;
		$this->sql($sql);
	}
	
	public function getRecordE($id, $idm){
		$req = "SELECT * FROM $this->table WHERE materia = '$id' AND empresa = '".$_SESSION['u']['enterprise']."' AND maquinaria = '".$idm."' LIMIT 1";
		$res = $this->select($req);
		return $res[0];
	}
	
	public function del($idMaterial) {
		$req = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM $this->table WHERE empresa = '".$_SESSION['u']['enterprise']."' AND materia_prima = '".$idMaterial."';";
		//var_dump($req); die;
		$this->sql($req);
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>