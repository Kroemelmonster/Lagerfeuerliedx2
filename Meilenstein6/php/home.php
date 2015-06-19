<!DOCTYPE html>
<?php
	$vorname = '';
	$nachname = '';
	if(isset($_COOKIE['vorname'])){$vorname = $_COOKIE['vorname'];}
	if(isset($_COOKIE['nachname'])){$nachname = $_COOKIE['nachname'];}
	if(isset($_POST['vorname'])){$vorname = $_POST['vorname'];}
	if(isset($_POST['nachname'])){$nachname = $_POST['nachname'];}
	if(($vorname != '') && ($nachname != '')) {
		setcookie('vorname', $vorname, time()+3600);
		setcookie('nachname', $nachname, time()+3600);
	}
?>
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
			<?php 
				if(($vorname != '') && ($nachname != '')) 
					echo '<div class="name">'.$vorname." ".$nachname.'</div>';
					print('<div class="blueborder bluebutton buttonbox alignmiddlediv" onclick="location.href=\'book_entry.php\'">Buch anlegen</div>
						   <div class="blueborder bluebutton buttonbox alignmiddlediv" onclick="location.href=\'book.php\'">Bücher zeigen</div>'
					);
			?>
			<div id="register" class="blueborder bluebutton buttonbox alignmiddlediv">Login</div>
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