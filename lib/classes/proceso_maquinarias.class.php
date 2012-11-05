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

class proceso_maquinarias extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getProcesosMaquinaria() {
		$req = "SELECT pt.nombre AS proceso_transformacion, pt.identificador AS identificador FROM `proceso_maquinarias` AS pm INNER JOIN procesos_transformacion AS pt ON pt.identificador = pm.proceso_transformacion;";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMaquinariaFromProceso($proceso) {
		$req = "SELECT m.nombre AS nombre, m.identificador AS identificador FROM `proceso_maquinarias` AS pm LEFT JOIN maquinarias AS m ON pm.maquinaria = m.identificador WHERE proceso_transformacion = '".$proceso."'";
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>