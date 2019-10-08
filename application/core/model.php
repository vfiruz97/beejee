<?php

class Model
{
	public $db;
	
	public function __construct() {
		$this->db = new PDO('mysql:host='.HOST.';dbname='.DB.'', LOGIN, PASS);
		$this->db->exec("set names utf8");
	}
	
	public function query($query)
	{
		return $this->db->query($query) ?? '';
	}
	
}