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

class empresa_cultivos extends entity {
	
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
	
	public function getRecordE($id){
		$req = "SELECT * FROM $this->table WHERE cultivo = '$id' AND empresa = '".$_SESSION['u']['enterprise']."' LIMIT 1";
		$res = $this->select($req);
		return $res[0];
	}
	
	public function updateE($data) {
		$updates = '';
		$query = "UPDATE $this->table SET ";
		foreach($data as $k => $v) {
			if($k != 'cultivo' || $k != 'empresa')
				$updates .= ($v == '') ? "$k = NULL, " : "$k = '$v', ";
		}
		$updates = removeLastChar($updates);
		$query .= "$updates WHERE empresa = '".$_SESSION['u']['enterprise']."' AND cultivo = '".$data['cultivo']."'";
		//var_dump($query); die;
		$this->update($query);
	}
	
	public function del($idCultivo) {
		$req = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM $this->table WHERE empresa = '".$_SESSION['u']['enterprise']."' AND cultivo = '".$idCultivo."';";
		//var_dump($req); die;
		$this->sql($req);
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>