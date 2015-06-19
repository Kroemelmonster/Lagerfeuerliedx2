function openInputField(e) {
	var windowtop = e.pageY ? e.pageY : e.clientY + body.scrollTop - body.clientTop;
	var windowleft = e.pageX ? e.pageX : e.clientX + body.scrollLeft  - body.clientLeft;
	$('#InputField').css('top',(windowtop+20)+'px').css('left',(windowleft+20)+'px').show();
}

function onload(){
	$('#register').click(function(e) {
			openInputField(e);
			html = '<form action="" method="post">';
			html += '<label for="vorname">Vorname : </label><input type="text" name="vorname">';
			html += '<br><label for="nachname">Nachname : </label><input type="text" name="nachname">';
			html += '<input type="submit" name="sub1" value="Absenden"/></form>';
			$('#InputField .inner').html(html);
		});
}