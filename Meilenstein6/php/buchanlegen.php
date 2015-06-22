<?php
	/*
		Für DB-Anbindung abgeändert
		Ermittelt User anhand des Namens
		- Falls zulässiger User: Speichere Buch
	*/

//$_GET['autor'].', '.$_GET['titel'].', '.$_GET['kapitel'].' Kapitel, '.$_GET['art'].', '.$_GET['isbn'].', '.$_GET['jahr'].', '.$_GET['auflage'].'. Auflage;'."\n";
	
	include("/db/book.php");
	include("/db/bookhandler.php");
	include("/db/user.php");
	include("/db/userhandler.php");
	include("/db/db_interface.php");
	
	$db = new DBInterface("localhost", "root", "", "mybooks");
	$bookHandler = new BookHandler($db);
	$userHandler = new UserHandler($db);
	
	
	$user = $userHandler->getUserByName($_GET['vorname'], $_GET['nachname']);
	if($user) {
		$book = new Book($_GET['isbn'], $_GET['autor'], $_GET['titel'], $_GET['kapitel'], $_GET['art'], $_GET['genre'], $_GET['jahr'], $_GET['auflage'], $user->id, $_GET['filmfavorit']);
		if($book->isValid()) {
			$result = $bookHandler->addBook($book);
			print_r($result);
		} else {
			echo "Buch ungültig!\n";
		}
	} else {
		echo "Benutzer ungültig!\n";
	}
?>