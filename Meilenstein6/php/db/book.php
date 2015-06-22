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
		'"auflage": ' . $this->auflage .
		'}';
	}
	
	public function isValid() {
        if(preg_match("/^(([1-9]\d*)|0)$/",$this->auflage) == false){
            return false;
        }
        if(!preg_match("/^(1\d{3}|200[0-9]|201[0-5])$/",$this->erscheinungsjahr)){
            return false;
        }
        if(!preg_match("/^(([1-9]\d*)|0)$/",$this->kapitel)){
            return false;
        }
        if(!preg_match("/^\d{1,13}$/",$this->isbn)){
            return false;
        }
        if(!preg_match("/^[A-Za-zäöüÄÖÜß]+$/",$this->autor)){
            return false;
        }
        if(!preg_match("/^.+$/",$this->titel)){
            return false;
        }
        if(!preg_match("/^[A-Za-zäöüÄÖÜß]+$/",$this->genre)){
            return false;
        }
        return true;
    }
}
?>