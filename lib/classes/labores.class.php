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

class labores extends entity {
	
	public function __construct() {
		parent::__construct('labores');
	}
	
	public function getMachines($idWork) {
		$sql = "SELECT m.nombre AS mnombre FROM labor_maquinarias AS lm LEFT JOIN maquinarias AS m ON ";
	}
	
	public function getAssociatedMachines($id) {
		$req = "SELECT lm.maquinaria as maquinaria, m.nombre as nombre FROM labor_maquinarias AS lm LEFT JOIN maquinarias as m ON m.identificador = lm.maquinaria WHERE lm.labor = '$id';";
		$res = $this->select($req);
		return $res;
	}
	
	public function getConsumoFromLabor($id) {
		$req = "SELECT consumo FROM labores WHERE identificador = '$id';";
		$res = $this->select($req);
		return $res;
	}
	
	public function getLaboresFromCategory($id) {
		$req = "SELECT c.identificador as identificador, c.nombre as nombre FROM $this->table as c WHERE categoria = '". $id ."'";
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function deleteAssociatedMachine($id) {
		$req = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM labor_maquinarias WHERE maquinaria = '$id';";
		//var_dump($req); die;
		$this->sql($req);
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>