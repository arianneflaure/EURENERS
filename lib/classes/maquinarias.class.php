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

class maquinarias extends entity {
	
	public $url;
	public $type;
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getAllRecords($track = false, $motif = null) {
		$req = "SELECT * FROM $this->table WHERE es_vehiculo_transporte = 0";
		$motif = is_null($motif) ? "Displays the records for $this->table" : $motif;
		//var_dump($motif); die;
		if($track == false || ($track == false && is_null($motif)))
			$res = $this->select($req);
		else
			$res = $this->select($req, $motif);
		return $res;
	}
	
	public function getMaq($es) {
		if($this->isFrio($es))
			return 'Frio';
		if($this->isTransformation($es))
			return 'Processing';
		if($this->isProduction($es))
			return 'Production';
		if($this->isVehiculo($es))
			return 'Vehiculos';
		
		return '';
	}
	
	public function getUrl($es) {
		if($es) {
			
		}
		if($this->isFrio($es))
			return 'Frio';
		if($this->isTransformation($es))
			return 'Processing';
		if($this->isProduction($es))
			return 'Production';
		if($this->isVehiculo($es))
			return 'Vehiculos';
	}
	
	public function getMaqType($id) {
		$req = "SELECT es_vehiculo_transporte, es_maquinaria_transformacion, es_maquinaria_produccion, es_maquinaria_frio FROM $this->table WHERE identificador = '$id'";
		$res = $this->select($req);
		
		if($res[0]->es_vehiculo_transporte == 1)
			return $this->type = 'Vehicule';
		if($res[0]->es_maquinaria_transformacion == 1)
			return $this->type = 'Transformacion';
		if($res[0]->es_maquinaria_produccion == 1)
			return $this->type = 'Produccion';
		if($res[0]->es_maquinaria_frio == 1)
			return $this->type = 'Frio';
		return '';
	}
	
	public function getAllVehicle() {
		$req = "SELECT * FROM $this->table WHERE es_vehiculo_transporte = '1'";
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllVehicleFromCategory($id) {
		$req = "SELECT * FROM $this->table WHERE es_vehiculo_transporte = '1' AND categoria = '".$id."'";
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllRecorridos() {
		$req = "SELECT * FROM $this->table WHERE es_vehiculo_transporte = '1'";
		$res = $this->select($req);
		return $res;
	}
	
	public function isFrio($es) {
		return ($es == 1) ? true : false;
	}
	
	public function isVehiculo($es) {
		return ($es == 1) ? true : false;
	}
	
	public function isProduction($es) {
		return ($es == 1) ? true : false;
	}
	
	public function isTransformation($es) {
		return ($es == 1) ? true : false;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
}
?>