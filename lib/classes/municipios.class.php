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

class municipios extends entity {
	
	public function __construct() {
		parent::__construct('municipios');
	}
	
	public function getMunicipiosFromProvincia($idprov, $track = false, $motif = null) {
		$req = "SELECT c.identificador as identificador, c.municipio as nombre FROM $this->table as c WHERE provincia = '". $idprov ."'";
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>