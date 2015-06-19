<!-- TODO
	- Layout der Radiobuttons (Genre) fixen
-->
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
 <title>Meh</title>
 <link rel="stylesheet" type="text/css" href="../css/waw.css"/>
 <script language="javascript" type="text/javascript" src="../js/inputcheck.js"></script>
</head>
<body>
	<!-- Augenkrebs... -->
	<div class="titelbook bluetext">
		<h2>Buch anlegen</h2>
	</div>
	<form action="../php/buchanlegen.php" method="get">
		<!-- Form-elements -->
		<div class="side left">
			<label for="iTitel">Titel</label>
			<input id="iTitel" type="text" name="titel" />
			<br/>
			
			<label for="iAutor">Autor</label>
			<input id="iAutor" type="text" name="autor" />
			<br/>
			
			<label for="iISBN">ISBN</label>
			<input id="iISBN" type="number" name="isbn" />
			<br/>
			
			<label for="iKapitel">Kapitel</label>
			<input id="iKapitel" type="number" name="kapitel" />
			<br/>
			
			<label for="iErscheinungsjahr">Erscheinungsjahr</label>
			<input id="iErscheinungsjahr" type="number" name="jahr" />
			<br/>
			
			<label for="iAuflage">Auflage</label>
			<input id="iAuflage" type="number" name="auflage" />
			<br/>
			
			<label for="iArtDesBuches">Art des Buches</label>
			<select id="iArtDesBuches" name="art">
				<option value="eBook">eBook</option>
				<option value="Newspaper">Newspaper</option>
				<option value="Taschenbuch">Taschenbuch</option>
				<option value="Lexikon">Lexikon</option>
				<option value="Hardcover" selected="selected">Hardcover</option>
				<option value="Paperback">Paperback</option>
			</select>
			<br/>
			
			<!-- Falls Genre als Checkbob mit Mehrfachauswahl implementiert werden soll...
			<select name="vGenre" multiple="multiple">
				<option value="gHorror" selected="selected">Horror</option>
				<option value="gPsycho">Psycho</option>
				<option value="gKrimi">Krimi</option>
				<option value="gDoku">Doku</option>
				<option value="gKomoedie">Kom&ouml;die</option>
				<option value="gRomanze">Romanze</option>
			</select>-->
			<div class="checkboxcontainer">
				<label for="iGenre">Genre</label>
				<div>
					<input id="iGenre" type="radio" name="genre" value="Horror" checked="checked"><span>Horror</span>
					<input id="iGenre"  type="radio" name="genre" value="Psycho"><span>Psycho</span>
					<input id="iGenre"  type="radio" name="genre" value="Krimi"><span>Krimi</span>
					<input id="iGenre"  type="radio" name="genre" value="Doku"><span>Doku</span>
					<input id="iGenre"  type="radio" name="genre" value="Komoedie"><span>Kom&ouml;die</span>
					<input id="iGenre"  type="radio" name="genre" value="Romanze"><span>Romanze</span>
				</div>
			</div>
			<br/>
		</div>
		
		<div class="side">
			<label for="iVorname">Vorname</label>
			<input id="iVorname"  type="text" name="vorname" />
			<br/>
			
			<label for="iNachname">Nachname</label>
			<input id="iNachname"  type="text" name="nachname" />
			<br/>
			
			<label for="iFavorit"text">Als Favorit markieren</label>
			<input id="iFavorit"  type="checkbox" name="filmfavorit" />
		</div>
		
		<div class="clearing"></div>
		
		<br/>
		<div class="alignmiddle">
			<input class="bluebutton" type="submit" name="absenden" value="Absenden" onclick="return check()"/>
		</div>
	</form>
</body>
</html>