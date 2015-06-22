<!DOCTYPE html>
<?php
	$vorname = '';
	$nachname = '';
	if(isset($_COOKIE['vorname'])){$vorname = $_COOKIE['vorname'];}
	if(isset($_COOKIE['nachname'])){$nachname = $_COOKIE['nachname'];}
?>
<html lang="de">
<head>
 <meta charset="utf-8"/>
 <title>Book</title>
 <link rel="stylesheet" type="text/css" href="../css/waw.css"/>
 <script language="javascript" type="text/javascript" src="../js/book.js"></script>
</head>
<?php

	include("db/book.php");
	include("db/bookhandler.php");
	include("db/db_interface.php");
				
	$db = new DBInterface("localhost", "root", "", "mybooks");
	$bookHandler = new BookHandler($db);
				
	$genres = $bookHandler->getGenres();
	$genre = "";
	if($genres) {
		for($i = 1; $i<=count($genres); $i++) {
			$books = $bookHandler->getBooksByGenre($genres[$i]);
			if($books) {
				$genre = $genres[$i];
				break;
			}
		}
	}
	echo '<body onload="onload(\'' . $genre . '\')">';
?>
	<div class="alignmiddle">
		<h2><span class="bluetext">Meine Bücher</span></h2>
		<div class="alignmiddlediv bookmenu">
			<!--<div id="Horror" class="blueborder bluebutton buttonbox" onclick="genre('Horror')">
				Horror
			</div>-->
			<?php				
				if($genres) {
					for($i = 1; $i<=count($genres); $i++) {
						$books = $bookHandler->getBooksByGenre($genres[$i]);
						if($books) {
							echo '<div id="' . $genres[$i] . '" class="blueborder bluebutton buttonbox" onclick="genre(\'' . $genres[$i] . '\')">' . $genres[$i] . '</div>';
						}
					}
				} else {
					echo "Keine Genres in der Datenbank gefunden!";
				}
			?>
			<div style="clear:both"></div>
		</div>
		<table id="table" class="booktable">
			<tr>
				<th>Autor</th>
				<th>Titel</th>
				<th>Buch</th>
			</tr>
			<tr>
				<td>text 1</td>
				<td>text 2</td>
				<td>text 3</td>
			</tr>
		
		</table>		
	</div>
	
</body>