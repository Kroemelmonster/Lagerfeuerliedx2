<?php
	/*	Zur absicherung mit ifs gelöst.
		Man könnte auch direkt den Filenamen übergeben doch dies ist sicher dass niemand die falschen files liest sondern nur die die er darf.
	*/
	if ($_GET['name'] == 'horrordata')
		echo  file_get_contents('../daten/horror_books.json'); 
	if ($_GET['name'] == 'romandata')
		echo  file_get_contents('../daten/roman_books.json'); 
		
?>