<?php
class Book {
	//Variablen
	public $isbn, $autor, $titel, $kapitel, $buchart, $genre, $erscheinungsjahr, $auflage;
	
	//Konstruktor
	function __construct($isbn, $autor, $titel, $kapitel, $buchart, $genre, $erscheinungsjahr, $auflage)
	{
		$this->isbn = $isbn;
		$this->autor = $autor;
		$this->titel = $titel;
		$this->kapitel = $kapitel;
		$this->buchart = $buchart;
		$this->genre = $genre;
		$this->erscheinungsjahr = $erscheinungsjahr;
		$this->auflage = $auflage;
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
}
?>