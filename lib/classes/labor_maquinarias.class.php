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

class labor_maquinarias extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getMaquinariasFromLabor($id) {
		$req = "SELECT m.identificador AS identificador, m.nombre AS nombre FROM $this->table AS lm LEFT JOIN maquinarias AS m ON lm.maquinaria = m.identificador WHERE lm.labor = '".$id."'";
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>