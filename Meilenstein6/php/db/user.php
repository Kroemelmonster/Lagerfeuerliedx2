<?php
class User {
	//Variablen
	public $vorname, $nachname, $id;
	
	//Konstruktor
	function __construct($vorname, $nachname, $id)
	{
		$this->vorname = $vorname;
		$this->nachname = $nachname;
		$this->id = $id;
	}
}
?>