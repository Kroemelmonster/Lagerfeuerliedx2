<?php
	include("book.php");
	include("bookhandler.php");
	include("user.php");
	include("userhandler.php");
	include("db_interface.php");
	
	$db = new DBInterface("localhost", "root", "", "mybooks");
	$bookHandler = new BookHandler($db);
	$userHandler = new UserHandler($db);
	
	$books = $bookHandler->getBooks();
	$users = $userHandler->getUsers();
	
	echo $bookHandler->toJSON("dump", $books);
	
	print_r($users);
		
	$books = $bookHandler->getBooksByGenre("Krimi");
	print_r($books);
	
	$bookHandler->addBook($books[0]);
?>