/**
 * Created by Admin on 24.01.2018.
 */
$(document).ready(function () {
    $("#a_side").change(function () {
        pythagorasCalc()
    });
    $('#b_side').change(function () {
        pythagorasCalc()
    });
    $('#c_side').change(function () {
        pythagorasCalc()
    });
});

function pythagorasCalc() {
    var target, answer;
    if (document.getElementById('F1').checked == true) {

        target = document.getElementById("a_side");
        answer = round(Math.pow(Math.pow(getFieldFloatValue('c_side'), 2) - Math.pow(getFieldFloatValue('b_side'), 2), 0.5), 5);
        answer_html = ` $\${a} = \\sqrt{c^2-b^2}=\\sqrt{${getFieldFloatValue('c_side')}^2-${getFieldFloatValue('b_side')}^2}=${answer} $$`;

    }
    else if (document.getElementById('F2').checked) {
        target = document.getElementById("b_side");
        answer = round(Math.pow(Math.pow(getFieldFloatValue('c_side'), 2) - Math.pow(getFieldFloatValue('a_side'), 2), 0.5), 5);
        answer_html = ` $\${b} = \\sqrt{c^2-a^2}=\\sqrt{${getFieldFloatValue('c_side')}^2-${getFieldFloatValue('a_side')}^2}=${answer} $$`;
    }
    else if (document.getElementById('F3').checked) {
        target = document.getElementById("c_side");
        answer = round(Math.pow(Math.pow(getFieldFloatValue('a_side'), 2) + Math.pow(getFieldFloatValue('b_side'), 2), 0.5), 5);
        answer_html = ` $\${c} = \\sqrt{a^2+b^2}=\\sqrt{${getFieldFloatValue('a_side')}^2+${getFieldFloatValue('b_side')}^2}=${answer} $$`;
    }

    target.value = isNaN(answer) ? '-' : answer;
    if(!isNaN(answer)){
        $('#result').html(answer_html);
        MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
    }

}

function getFieldFloatValue(fieldId) {
    return parseFloat(document.getElementById(fieldId).value.replace("\,", "."));
}
function round(n, dec) {
    X = n * Math.pow(10, dec);
    X = Math.round(X);
    return (X / Math.pow(10, dec));
}