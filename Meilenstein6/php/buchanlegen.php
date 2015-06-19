<?php
$my_file = '../daten/books.txt'; // file direction
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file); // handle zur file
$newline = $_GET['autor'].', '.$_GET['titel'].', '.$_GET['kapitel'].' Kapitel, '.$_GET['art'].', '.$_GET['isbn'].', '.$_GET['jahr'].', '.$_GET['auflage'].'. Auflage;'."\n";
// unsere tolle Zeile mit allen daten
fwrite($handle, $newline); // zeile in datei schreiben
fclose($handle); // datei schliesen
/* uiii ist das schwer. Ich geh einfach mal davon aus dass alle GETS funktionieren.
 ansonten müsste man hier ne abfrage machen für jedes einzelne was ca so aussieht :
	if (isset($_GET['autor']) == false) {
		dont save it ...
	} if ....
	PHP macht aus einer nicht existenten GET immer ein leeren String, und kein Fehler -> kann ich es so lassen da dann einfach leere daten drinstehtn : zb Peter hans, , 1990...
*/
?>