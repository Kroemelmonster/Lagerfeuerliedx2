<?php
class UserHandler {
	//Variablen
	private $db;
	
	//Konstruktor
	function __construct($db)
	{
		$this->db = $db;
	}
	
	//Methoden		
	public function getUsers() {
		$result = $this->db->query("SELECT * FROM benutzer");
		if($result) {
			$users = array();
			while ($row = $result->fetch_object())
			{
				$users[] = new User($row->vorname, $row->nachname, $row->id);
			}
			return $users;
		} else {
			echo "UserHandler.getUsers(): query failed\n";
		}
		return $result;
	}
	
	public function getUserByID($id) {
		$result = $this->db->query("SELECT * FROM benutzer WHERE id='" . $id ."'");
		if($result) {
			while ($row = $result->fetch_object())
			{
				return new User($row->vorname, $row->nachname, $row->id);
			}
		} else {
			echo "UserHandler.getUserByID(): query failed\n";
		}
		return $result;
	}
	
	public function addBook($book) {
		$genre_id = $this->getGenreID($book->genre);
		$buchart_id = $this->getBuchartID($book->buchart);
		
		if(!$genre || !$buchart) {
			echo "Genre oder Buchart unbekannt!\n";
			return $false;
		} else {
			$sql = "INSERT INTO buecher (isbn, autor, titel, kapitel, buchart_id, genre_id, erscheinungsjahr, auflage) values('" . $book->isbn . "', '" . $book->autor . "', '" . $book->titel . "', '" . $book->kapitel . "', '" . $buchart_id . "', '" . $genre_id . "', '" . $book->erscheinungsjahr . "', '" . $book->auflage . "')";
			$result = $this->db->query(sql);
			if(!$result) {
				echo "UserHandler.addBook(): query failed\n";
				return false;
			}
			return $result;
		}
	}
	
	public function addFavourite($book) {
		$genre_id = $this->getGenreID($book->genre);
		$buchart_id = $this->getBuchartID($book->buchart);
		
		if(!$genre || !$buchart) {
			echo "Genre oder Buchart unbekannt!\n";
			return $false;
		} else {
			$sql = "INSERT INTO buecher (isbn, autor, titel, kapitel, buchart_id, genre_id, erscheinungsjahr, auflage) values('" . $book->isbn . "', '" . $book->autor . "', '" . $book->titel . "', '" . $book->kapitel . "', '" . $buchart_id . "', '" . $genre_id . "', '" . $book->erscheinungsjahr . "', '" . $book->auflage . "')";
			$result = $this->db->query(sql);
			if(!$result) {
				echo "UserHandler.addBook(): query failed\n";
				return false;
			}
			return $result;
		}
	}
}
?>