function onload(){
	//mit horror begint es...
    horror();
}

function sendRequest(filename,name) {
	// funktioniert also nicht mit read file oder son käse... musss localhosted werden
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status== 200) {
			console.log(xmlhttp.responseText);
			var json = JSON.parse(xmlhttp.responseText);
			console.log(json);
			load(json[name]);
		}
	}
	xmlhttp.open("GET",filename);
	xmlhttp.send();
}

function horror(){
	// swap die class names.
    var o1 = document.getElementById("horror");
    o1.className = "blueborder bluebutton buttonbox selected";
    
    var o2 = document.getElementById("roman");
    o2.className = "blueborder bluebutton buttonbox";
	sendRequest("horror_books.json","horrordata");
}

function roman(){
	// swap die class names.
    var o1 = document.getElementById("horror");
    o1.className = "blueborder bluebutton buttonbox";
    
    var o2 = document.getElementById("roman");
    o2.className = "blueborder bluebutton buttonbox selected";
	sendRequest("roman_books.json","romandata");
}

function load(json) {
	// erstelle den tabellen inhalt html anhand der json object datei
	var table = "";
	table += '<tr>';
	/*table += '<th>Autor</th>';
	table += '<th>Titel</th>';
	table += '<th>Kapitel</th>';
	table += '<th>Buchart</th>';
	table += '<th>ISBN</th>';
	table += '<th>Erscheinungjahr</th>';
	table += '<th>Auflage</th>';*/
	//Für jeden Schlüssel des ersten JSON-Eintrages...
	for(k in json[0]) {
		//Wandelt den ersten Buchstaben in einen Großbuchstaben um und "hängt" den Rest des Wortes hinten an
		table += '<th>' + k[0].toUpperCase() + k.slice(1) + '</th>';
	}
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
