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

class categorias extends entity {
	
	private $tableBt = 'tipos_basicos';
	
	public function __construct() {
		parent::__construct('categorias');
	}
	
	public function getAllRecords($track = false, $motif = null) {
		$req = "SELECT c.identificador as identificador, c.nombre as nombre, c.descripcion, tp.identificador as idtipobasico, tp.nombre as tipobasico  FROM $this->table as c LEFT JOIN $this->tableBt as tp ON c.tipo_basico = tp.identificador";
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllVehiculoRecords($track = false, $motif = null) {
		$req = "SELECT c.identificador as identificador, c.nombre as nombre, c.descripcion, tp.identificador as idtipobasico, tp.nombre as tipobasico  FROM $this->table as c LEFT JOIN $this->tableBt as tp ON c.tipo_basico = tp.identificador INNER JOIN maquinarias AS v ON v.categoria = c.identificador WHERE v.es_vehiculo_transporte = 1 GROUP BY c.identificador";
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>