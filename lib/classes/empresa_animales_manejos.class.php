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

class  empresa_animales_manejos extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getAllRecordsE($id) {
		$req = "SELECT * FROM $this->table WHERE animal = '".$id."' AND empresa = '".$_SESSION['u']['enterprise']."'";
		//$motif = is_null($motif) ? "Displays the records for $this->table" : $motif;
		//if($track == false || ($track == false && is_null($motif)))
			$res = $this->select($req);
		//else
		//	$res = $this->select($req, $motif);
		return $res;
	}
	
	public function update($updates, $table = null) {
		//var_dump($updates); die;
		$table = is_null($table) ? $table = __CLASS__ : $table;
		$sql = $this->buildUpdateQueryWhere($updates, array('empresa' => $_SESSION['u']['enterprise'], 'animal' => $updates['animal'], 'manejo' => $updates['manejo']), $table);
		//var_dump($sql); die;
		$this->sql($sql);
	}
	
	public function getRecordE($id, $id2){
		$req = "SELECT * FROM $this->table WHERE animal = '$id' AND manejo = '$id2' AND empresa = '".$_SESSION['u']['enterprise']."' LIMIT 1";
		$res = $this->select($req);
		if(!empty($res))
			return $res[0];
		else
			return null;
	}
	
	public function del($id) {
		$req = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM $this->table WHERE empresa = '".$_SESSION['u']['enterprise']."' AND energia = '".$id."';";
		//var_dump($req); die;
		$this->sql($req);
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>