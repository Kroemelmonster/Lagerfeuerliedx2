<?php
class DBInterface {
	//Variablen
	private $host, $username, $password, $database;
	
	//Konstruktoren
	function __construct($host, $username, $password, $database)
	{
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
	}
	
	//Methoden
	public function query($stmt) {
		$db = @new mysqli($this->host, $this->username, $this->password, $this->database);
		$result;
		if(mysqli_connect_errno() == 0)
		{
			$result = $db->query($stmt);
		}
		else
		{
			echo "Could not connect to database: <strong>" . mysqli_connect_errno() . "</strong>";
			$result = false;
		}
		$db->close();
		
		return $result;
	}
}
?>