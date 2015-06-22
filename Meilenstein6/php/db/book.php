<?php
class Book {
	//Variablen
	public $isbn, $autor, $titel, $kapitel, $buchart, $genre, $erscheinungsjahr, $auflage, $user_id, $favorit;
	
	//Konstruktor
	function __construct($isbn, $autor, $titel, $kapitel, $buchart, $genre, $erscheinungsjahr, $auflage, $user_id, $favorit)
	{
		$this->isbn = $isbn;
		$this->autor = $autor;
		$this->titel = $titel;
		$this->kapitel = $kapitel;
		$this->buchart = $buchart;
		$this->genre = $genre;
		$this->erscheinungsjahr = $erscheinungsjahr;
		$this->auflage = $auflage;
		$this->user_id = $user_id;
		$this->favorit = $favorit;
	}
	
	//Methoden
	public function toJSON()
	{
		return '{' .
		'"autor": "' . $this->autor .'",' .
		'"titel": "' . $this->titel .'",' .
		'"kapitel": ' . $this->kapitel .',' .
		'"buchart": "' . $this->buchart .'",' .
		'"ISBN": ' . $this->isbn .',' .
		'"erscheinungsjahr": ' . $this->erscheinungsjahr .',' .
		'"auflage": ' . $this->auflage .'' .
		'"genre": "' . $this->genre .'",' .
		'}';
	}
	
	public function isValid() {
		//TODO: Serverseitige Validierung der Attribute
		return true;
	}
}
?>