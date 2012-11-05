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

class materias extends entity {
	
	public function __construct() {
		parent::__construct('materias_primas');
	}
	
	public function getMateriasFromCategory($id) {
		$req = "SELECT c.identificador as identificador, c.nombre as nombre FROM $this->table as c WHERE categoria = '". $id ."'";
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>