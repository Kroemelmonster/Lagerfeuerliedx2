<?php
class BookHandler {
	//Variablen
	private $db;
	
	//Konstruktor
	function __construct($db)
	{
		$this->db = $db;
	}
	
	//Methoden	
	public function getGenres() {
		$result = $this->db->query("SELECT * FROM genres");
		if($result) {
			$genres = array();
			while ($row = $result->fetch_object())
			{
				$genres[$row->id] = $row->name;
			}
			return $genres;
		} else {
			echo "BookHandler.getGenres(): query failed\n";
		}
		return $result;
	}
	
	public function getBucharten() {
		$result = $this->db->query("SELECT * FROM bucharten");
		if($result) {
			$bucharten = array();
			while ($row = $result->fetch_object())
			{
				$bucharten[$row->id] = $row->name;
			}
			return $bucharten;
		} else {
			echo "BookHandler.getBucharten(): query failed\n";
		}
		return $result;
	}
	
	public function getBuchartID($buchart)	{
		$result = $this->db->query("SELECT * FROM bucharten WHERE name='" . $buchart . "'");
		if($result) {
			while ($row = $result->fetch_object())
			{
				return $row->id;
			}
		} else {
			echo "BookHandler.getBuchartID(): query failed\n";
		}
		return $result;
	}
	
	public function getGenreID($genre)	{
		$result = $this->db->query("SELECT * FROM genres WHERE name='" . $genre . "'");
		if($result) {
			while ($row = $result->fetch_object())
			{
				return $row->id;
			}
		} else {
			echo "BookHandler.getGenreID(): query failed\n";
		}
		return $result;
	}
	
	public function getBooks() {
		$genres = $this->getGenres($this->db);
		$bucharten = $this->getBucharten($this->db);
		$result = $this->db->query("SELECT * FROM buecher");
		if($result) {
			$books = array();
			while ($row = $result->fetch_object())
			{
				$books[] = new Book($row->isbn, $row->autor, $row->titel, $row->kapitel, $bucharten[$row->buchart_id], $genres[$row->genre_id], $row->erscheinungsjahr, $row->auflage);
			}
			return $books;
		} else {
			echo "BookHandler.getBooks(): query failed\n";
		}
		return $result;
	}
	
	public function getBooksByGenre($genre) {
		$genres = $this->getGenres($this->db);
		$bucharten = $this->getBucharten($this->db);
		$genre_id = $this->getGenreID($genre);
		$result = $this->db->query("SELECT * FROM buecher WHERE genre_id='" . $genre_id . "'");
		if($result) {
			$books = array();
			while ($row = $result->fetch_object())
			{
				$books[] = new Book($row->isbn, $row->autor, $row->titel, $row->kapitel, $bucharten[$row->buchart_id], $genres[$row->genre_id], $row->erscheinungsjahr, $row->auflage);
			}
			return $books;
		} else {
			echo "BookHandler.getBooksByGenre(): query failed\n";
		}
		return $result;
	}
	
	public function getBookByISBN($isbn) {
		$genres = $this->getGenres($this->db);
		$bucharten = $this->getBucharten($this->db);
		$result = $this->db->query("SELECT * FROM buecher WHERE isbn='" . $isbn ."'");
		if($result) {
			while ($row = $result->fetch_object())
			{
				return new Book($row->isbn, $row->autor, $row->titel, $row->kapitel, $bucharten[$row->buchart_id], $genres[$row->genre_id], $row->erscheinungsjahr, $row->auflage);
			}
		} else {
			echo "BookHandler.getBookByID(): query failed\n";
		}
		return $result;
	}
	
	public function addBook($book) {
		$genre_id = $this->getGenreID($book->genre);
		$buchart_id = $this->getBuchartID($book->buchart);
		$book = $this->getBookByISBN($book->isbn);
		
		if($book) {
			echo "Buch mit der ISBN " . $book->isbn . " existiert bereits!\n";
			return false;
		}
		if(!$genre || !$buchart) {
			echo "Genre oder Buchart unbekannt!\n";
			return false;
		} else {
			$sql = "INSERT INTO buecher (isbn, autor, titel, kapitel, buchart_id, genre_id, erscheinungsjahr, auflage, user_id) values('" . $book->isbn . "', '" . $book->autor . "', '" . $book->titel . "', '" . $book->kapitel . "', '" . $buchart_id . "', '" . $genre_id . "', '" . $book->erscheinungsjahr . "', '" . $book->auflage . "', '" . $book->user->id . "')";
			$result = $this->db->query(sql);
			if(!$result) {
				echo "BookHandler.addBook(): query failed\n";
				return false;
			}
			return $result;
		}
	}
	
	public function toJSON($name, $books) {
		$result = 
		'{' .
			'"' . $name . '": [';
		
		for($i = 0; $i < count($books); $i++)
			$result .= $books[$i]->toJSON() . ($i == count($books) - 1 ? "" : ",");
		$result .=
			']' .
		'}';
		
		return $result;
	}
}
?>