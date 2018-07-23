
$('#rescalc').click(function () {
    var integ = parseInt($('#simpIntegerPart').val());
    var numer = parseInt($('#simpNumerator').val());
    var denumer = parseInt($('#simpDenominator').val());
    let result = `$$ {${ !isNaN(integ)?integ:''}}\\frac{${numer}}{${denumer}} =`;


    if (!isNaN(integ)) {
        numer = denumer * integ + numer;
        result += ` \\frac{${numer}}{${denumer}} =`;
    }

    var commun = 1;
    for (var i = denumer; i > 1; i--) {
        if (numer % i == 0 && denumer % i == 0) {
            commun = i;
            result += ` \\frac{${numer}:${commun}}{${denumer}:${commun}} =`;
            break;
        }
    }
    numer = numer / commun;
    denumer = denumer / commun;
    if (numer > denumer) {
        result += ` {${parseInt(numer / denumer)}}`;
        numer = numer % denumer;

    }
    if(numer!=0){
        result += `\\frac{${numer}}{${denumer}}$$`;
    }else {
        result +=`$$`
    }

    $('#simplifit').html(result);
    MathJax.Hub.Queue(['Typeset',MathJax.Hub]);
    $('#simplifity').css('visibility','visible');
});
$('#btnresult').click(function () {
    if (!$('.area').hasClass('show_area'))
        $('.area').toggleClass('show_area');

});