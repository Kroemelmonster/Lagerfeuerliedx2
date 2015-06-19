/*	^ : vom start
	([1-9]\d*): Entweder 1-9 und danach unendlich viele mögliche ziffen ( 0-10 == d )
	0 : oder 0
	$ : danach nix mehr zusätzliches
*/
var regPosNumbers = /^(([1-9]\d*)|0)$/
/*	^ : vom start
	[A-Za-zäöüÄÖÜß]+ : Eine anzhal von deutschen buchstaben
	$ : danach nix mehr zusätzliches
*/
var regNames = /^[A-Za-zäöüÄÖÜß]+$/
/* 	^ : vom start
	d : alle möglichen zahlen
	{1,13} : welche 1 mal bis 13 mal vorkommen müssen
	% : danach nix mehr zusätzliches
*/
var regISBN = /^\d{1,13}$/
/* 	^ : vom start
	entweder 1\d{3} : also 1 mit genau 3 ziffern ( 1000->1999)
	oder 200[0-9] : 2000 -> 2009
	oder 201[0-5] : 2010 -> 2015
	% : danach nix mehr zusätzliches
*/
var regErscheinungsjahr = /^(1\d{3}|200[0-9]|201[0-5])$/;
/*	^ : vom start
	[A-Za-zäöüÄÖÜß]+ : Eine anzhal von deutschen buchstaben mit zahlen
	$ : danach nix mehr zusätzliches
*/
var regTitel = /^.+$/;
/*  ^ : vom start ( sonst kann davor zb sonderzeichen stehen )
	.+ : Darf halt nicht leer sein
	$ : damit man nicht danach müll schreiben kann
*/

var regSchauspielerundSongs = /^[A-Za-zäöüÄÖÜß ]+(,[A-Za-zäöüÄÖÜß ]+)*$/;
   

function check(){
	var check = true;
	var ele = document.getElementsByName("nachname")[0];
    if(!regNames.test(ele.value)){
        check = false;
		ele.focus();
		ele.className = "error";
    }
	else { ele.className = ""; }
	ele = document.getElementsByName("vorname")[0];
    if(!regNames.test(ele.value)){
        check = false;
		ele.focus();
		ele.className = "error";
    }
	else { ele.className = ""; }
	ele = document.getElementsByName("auflage")[0];
    if(!regPosNumbers.test(ele.value)){
		check = false;
		ele.focus();
		ele.className = "error";
    }
	else { ele.className = ""; }
	ele = document.getElementsByName("jahr")[0];
	if(!regErscheinungsjahr.test(ele.value)){
		check = false;
		ele.focus();
		ele.className = "error";
    }
	else { ele.className = ""; }
	ele = document.getElementsByName("kapitel")[0];
    if(!regPosNumbers.test(ele.value)){
		check = false;
		ele.focus();
		ele.className = "error";
    }
	else { ele.className = ""; }
	ele = document.getElementsByName("isbn")[0];
    if(!regISBN.test(ele.value)){
		check = false;
		ele.focus();
		ele.className = "error";
    }
	else { ele.className = ""; }
	ele = document.getElementsByName("autor")[0];
    if(!regNames.test(ele.value)){
        check = false;
		ele.focus();
		ele.className = "error";
    }
	else { ele.className = ""; }
	ele = document.getElementsByName("titel")[0];
    if(!regTitel.test(ele.value)){
		check = false;
		ele.focus();
		ele.className = "error";
    }
	else { ele.className = ""; }
	if (check == false) {
		alert("Einige Eingaben sind fehlerhaft. Bitte überprüfen Sie ihre Eingabe");
	}
	return check;
}