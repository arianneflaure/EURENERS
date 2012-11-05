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

class recorridos extends entity {
	
	public function __construct() {
		parent::__construct('recorridos');
	}
	
	public function getAssociatedRoutes($id) {
		$req = "SELECT r.nombre as nombre, r.unidad as unidad, r.fuente, r.identificador FROM recorridos AS r LEFT JOIN maquinarias as m ON m.identificador = r.maquinaria WHERE m.identificador = '$id';";
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllRecorridosFromVehicule($id) {
		$req = "SELECT * FROM recorridos WHERE maquinaria = '$id';";
		$res = $this->select($req);
		return $res;
	}
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>