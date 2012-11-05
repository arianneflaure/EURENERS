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

class  procesos_transformacion extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getAssociatedMachines($id) {
		$req = "SELECT lm.maquinaria as maquinaria, m.nombre as nombre FROM proceso_maquinarias AS lm LEFT JOIN maquinarias as m ON m.identificador = lm.maquinaria WHERE lm.proceso_transformacion = '$id';";
		$res = $this->select($req);
		return $res;
	}
	
	public function deleteAssociatedMachine($id) {
		$req = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM proceso_maquinarias WHERE maquinaria = '$id';";
		//var_dump($req); die;
		$this->sql($req);
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>