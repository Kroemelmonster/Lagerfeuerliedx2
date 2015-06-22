<?php
	/*
		Für DB-Anbindung abgeändert
		Nimmt "name" als Genre-Bezeichnung und liefert alle Bücher des gewünschten Genres in JSON-Format zurück
	*/
	include("db/book.php");
	include("db/bookhandler.php");
	include("db/db_interface.php");
	
	$db = new DBInterface("localhost", "root", "", "mybooks");
	$bookHandler = new BookHandler($db);
	
	$books = $bookHandler->getBooksByGenre($_GET['name']);
	echo $bookHandler->toJSON("dump", $books);
?>