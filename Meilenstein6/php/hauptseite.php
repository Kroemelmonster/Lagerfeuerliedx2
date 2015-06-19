<!DOCTYPE html>
<html lang="de">
<head>
 <meta charset="utf-8"/>
 <title>Meh-Home</title>
 <link rel="stylesheet" type="text/css" href="../css/waw.css"/>
 <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script language="javascript" type="text/javascript" src="../js/main.js"></script>
</head>
<body onload="onload()">
	<div class="alignmiddle">
		<h2><span class="bluetext">I</span>nternet <span class="bluetext">B</span>ook <span class="bluetext">D</span>ata<span class="bluetext">b</span>ase</h2>
		
		<!-- Katzenbild da das Bild von Livendo.de nicht geladen werden kann -->
		<div class="bluetext caption">
			WE
			<img 
				class="blueborder" 
				src="http://38.media.tumblr.com/c5dbbebd38756705971cf3b25c11297b/tumblr_mtwkeeFvca1qdx2u2o5_500.jpg" 
				width="400px"
				align="middle"
			/>
			Books
		</div>
		<div style="width:100%;">
			<div class="blueborder bluebutton buttonbox alignmiddlediv" onclick="location.href='book_entry.html'">
				Buch anlegen
			</div>
			<div class="blueborder bluebutton buttonbox alignmiddlediv" onclick="location.href='book.html'">
				Login
			</div>
			<div id="register" class="blueborder bluebutton buttonbox alignmiddlediv">
				Registrieren
			</div>
		</div>
	</div>
	<div id="InputField">
		<div class="inner">
			Hello 
			<br>
			peter
		</div>
	</div>
</body>

<?php   include_once "php/footer.php";    ?>