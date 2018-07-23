function round(n,dec)
{
	X = n * Math.pow(10,dec);
	X= Math.round(X);
	return (X / Math.pow(10,dec));
}

function disable() {
    var controlPairs = new Array();
    controlPairs['F1'] = 'A';
    controlPairs['F2'] = 'B';
    controlPairs['F3'] = 'C';
    var disabledClass = "disabled vis biginput R W120";
    var enabledClass = "vis biginput R W120";
    
    for (var i in controlPairs) {
        var field = document.getElementById(controlPairs[i]);
        var toggle = document.getElementById(i);
        
        field.disabled = toggle.checked;
        field.className = toggle.checked ? disabledClass : enabledClass;
    }
}

function pythagorasCalc() {
	var target, answer;
	if (document.getElementById('F1').checked) {
		target = document.getElementById("A");
        answer = round(Math.pow(Math.pow(getFieldFloatValue('C'),2)-Math.pow(getFieldFloatValue('B'),2),0.5), 5);
	}
	else if (document.getElementById('F2').checked) {
        target = document.getElementById("B");
        answer = round(Math.pow(Math.pow(getFieldFloatValue('C'),2)-Math.pow(getFieldFloatValue('A'),2),0.5), 5);
	}
	else if (document.getElementById('F3').checked) {
        target = document.getElementById("C");
        answer = round(Math.pow(Math.pow(getFieldFloatValue('A'),2)+Math.pow(getFieldFloatValue('B'),2),0.5), 5);
	}
    
    target.value = isNaN(answer) ? '-' : answer;
}

function getFieldFloatValue(fieldId) {
    return parseFloat(document.getElementById(fieldId).value.replace("\,","."));
}