function onload(){
	//mit horror begint es...
    horror();
}

function sendRequest(name) {
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status== 200) {
			var json = JSON.parse(xmlhttp.responseText);
			load(json[name]);
		}
	}
	// rufe getBooks auf und warte auf antwort.
	// der name enspricht hierbei sowohl der json name als auch eine absicherung in der php file.
	xmlhttp.open("GET",'../php/getBooks.php?name='+name);
	xmlhttp.send();
}

function horror(){
	var o1 = document.getElementById("horror");
	// damit wir den server nicht unötig belasten schauen wir ob horror schon selected ist 
	if (o1.className == "blueborder bluebutton buttonbox selected")
		return;
	// ist er nicht selected ja dann selecte es und lade daten.
	// swap die class names.
    o1.className = "blueborder bluebutton buttonbox selected";
    
    var o2 = document.getElementById("roman");
    o2.className = "blueborder bluebutton buttonbox";
	sendRequest("horrordata");
}

function roman(){
	var o1 = document.getElementById("roman");
	// damit wir den server nicht unötig belasten schauen wir ob roman schon selected ist 
	if (o1.className == "blueborder bluebutton buttonbox selected")
		return;
	// swap die class names.
    o1.className = "blueborder bluebutton buttonbox selected";
    
	var o2 = document.getElementById("horror");
    o2.className = "blueborder bluebutton buttonbox";
	sendRequest("romandata");
}

function genre(name){
	var o1 = document.getElementById(name);
	
	var x = document.getElementsByClassName("blueborder bluebutton buttonbox");
	var i;
	for (i = 0; i < x.length; i++) {
		x[i].className = "blueborder bluebutton buttonbox";
	}
	
    o1.className = "blueborder bluebutton buttonbox selected";
	
	/*// damit wir den server nicht unötig belasten schauen wir ob roman schon selected ist 
	if (o1.className == "blueborder bluebutton buttonbox selected")
		return;
	// swap die class names.
    o1.className = "blueborder bluebutton buttonbox selected";
    
	var o2 = document.getElementById("horror");
    o2.className = "blueborder bluebutton buttonbox";*/
	sendRequest(name);
}

function load(json) {
	// erstelle den tabellen inhalt html anhand der json object datei
	var table = "";
	table += '<tr>';
	table += '<th>Autor</th>';
	table += '<th>Titel</th>';
	table += '<th>Kapitel</th>';
	table += '<th>Buchart</th>';
	table += '<th>ISBN</th>';
	table += '<th>Erscheinungjahr</th>';
	table += '<th>Auflage</th>';
	// nachfolgende geht auch es nimmt halt einfach nur die keys. die wiederum leider lowcase sind
1	/*Object.keys(json[0]).forEach(function(k) {
		table += '<th>'+k+'</th>';
	});*/
	table += '</tr>';
	for (index = 0; index < json.length; ++index) {
		table += '<tr>';
		for(var entry in json[index]) { 
			table += '<td>'+json[index][entry];
			if (entry == "auflage")
				table += ". Auflage";
			table += '</td>';
		}
		table += '</tr>';
	}
    document.getElementById("table").innerHTML = table;
}