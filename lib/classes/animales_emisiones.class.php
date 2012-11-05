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

class animales_emisiones extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getAllRecordsFromAnimal($ida) {
		$req = "SELECT * FROM $this->table WHERE animal = '$ida';";
		//var_dump($req); exit;
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllRecordsEfactor($id) {
		$req = "SELECT * FROM $this->table WHERE animal = '$ida';";
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>