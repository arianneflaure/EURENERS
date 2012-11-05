<?php
@session_start();
/**
 * Classe de gestion des entreprises
 * @author 		Patient Assontia <assontia@gmail.com>
 * @package 	Camertic Framework
 * @since 		Version 1.0
 * @version		1.1
 * @copyright 	Copyright (c) 2012, Patient
 * @license		GNU General Public License
 */

class productos_finales extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getProductosFinalesFromCategory($id) {
		$req = "SELECT identificador, nombre FROM $this->table WHERE categoria = '". $id ."'";
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>