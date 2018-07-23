@extends('layouts.app')
@push('style')
<link rel="stylesheet" href="{{asset('css/calculator/fraction.css')}}">
<style>
    .panel-group{
        margin-top: 20px!important;
    }
    .operation {
        position: relative;
    }

    .operant {
        position: absolute;
    }

    #main {
        padding-top: 0;
    }

    #operation {

        border-radius: 5px;
    }

    @media (max-width: 767px) {
        .main-box.col-xs-12 {
            padding: 15px 5px;
        }

        #btnresult {
            margin-left: 45%;
        }
    }
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="col-md-9 col-xs-12">

            <div class="row text-center">
                <h2 style="color: #FF4F00;">@lang('calc.Fraction Calculator')</h2>
            </div>
            <div id="w1" class="inner-page">
                <div id="wrapper">
                    <div id="main">
                        <div id="content">
                            <div id="twocolumns">
                                <div class="c1">
                                    <div class="">


                                        <div class="calc01">
                                            <div class="calculator">
                                                <form>
                                                    <fieldset>
                                                        <div class="main-box col-xs-12 col-md-7 col-md-offset-3">
                                                            <div class="row">
                                                                <div class="f-element">
                                                                    <input type="text" class="form-text"
                                                                           id="firstIntegerPart">
                                                                    <dl>
                                                                        <dt class="  ">
                                                                            <input type="text" class="form-text  "
                                                                                   id="firstNumerator">
                                                                        </dt>
                                                                        <dd>
                                                                            <input type="text" class="form-text"
                                                                                   id="firstDenominator">
                                                                        </dd>
                                                                    </dl>
                                                                </div>
                                                                <div class="operation">
                                                                    <select class="operant " id="operation"
                                                                            style="-webkit-tap-highlight-color: rgba(255, 255, 255, 0);">
                                                                        <option title="images/ico16.png" value="plus">
                                                                            +
                                                                        </option>
                                                                        <option title="images/ico17.png" value="minus">-
                                                                        </option>
                                                                        <option title="images/ico15.png"
                                                                                value="multiplication">
                                                                            *
                                                                        </option>
                                                                        <option title="images/ico14.png"
                                                                                value="division">/
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="s-element">
                                                                    <input type="text" class="form-text"
                                                                           id="secondIntegerPart">
                                                                    <dl>
                                                                        <dt class="  ">
                                                                            <input type="text" class="form-text  "
                                                                                   id="secondNumerator">
                                                                        </dt>
                                                                        <dd class=" parent-active ">
                                                                            <input type="text"
                                                                                   class="form-text text-active "
                                                                                   id="secondDenominator">
                                                                        </dd>
                                                                    </dl>
                                                                </div>
                                                                <input type="button" class="btn-equal" id="btnresult"
                                                                       value="Равно"
                                                                       style="background: url({{asset('images/bg-equal.gif')}}) ">
                                                                <div class="result" id="resultDr">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="  area col-xs-12 col-md-10 col-md-offset-1">
                                                <div class="row"><h3 class="title"
                                                                     style="color: red">@lang('calc.answer')</h3>
                                                </div>
                                                <div class="text">
                                                    <div class="history">
                                                        <div id="contentHistory" class="drob">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="result" id="resultDr">
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="row text-center">
                <h2 style="font-size:24px; margin-top:0;color: #FF4F00;">@lang('calc.fraction simplification')</h2>
            </div>
            <div class="row" style="display:flex;justify-content: center">
            <div style="margin-top: 20px;padding: 15px; border-radius: 15px" class="col-xs-12 col-md-3 calc-form">
                <div class="calc01">
                    <div class="calculator">
                        <form>
                            <fieldset>
                                <div class="row">
                                    <div class="row" style="display:  flex;justify-content:  center;">
                                        <div class="f-element" style="margin-left: 32px; ">
                                            <input type="text" class="form-text" id="simpIntegerPart">
                                            <dl>
                                                <dt class="  ">
                                                    <input type="text" class="form-text  " id="simpNumerator">
                                                </dt>
                                                <dd>
                                                    <input type="text" class="form-text" id="simpDenominator">
                                                </dd>
                                            </dl>
                                        </div>

                                    </div>
                                    <div class="row" style="display: flex;justify-content: center">

                                        <span style="margin-top: 15px" class="btn btn-success"
                                              id="rescalc">@lang('calc.answer')
                                        </span>

                                    </div>


                                </div>

                            </fieldset>
                        </form>

                    </div>
                </div>

            </div>
            </div>
            <div class="col-xs-12" style="display: flex;justify-content: center;visibility: hidden" >
            <div class="col-xs-12 col-md-6 calc-form" style="color: white;margin-top: 15px" id="simplifit"></div>
            </div>
            @include('template.show_theory')
        </div>
        @include('baners.right_banner')

    </div>

@endsection
@push('script')
<script src="{{asset('/js/calculator/BrokenNumberHelper.js')}}"></script>
<script>
    $('#rescalc').click(function () {
        var a = parseInt($('#simpIntegerPart').val()), b = parseInt($('#simpNumerator').val()), c = parseInt($('#simpDenominator').val());
        let d = `$$ {${isNaN(a) ? '' : a}}\\frac{${b}}{${c}} =`;
        isNaN(a) || (b = c * a + b, d += ` \\frac{${b}}{${c}} =`);
        for (var e = 1, f = c; 1 < f; f--)if (0 == b % f && 0 == c % f) {
            e = f, d += ` \\frac{${b}:${e}}{${c}:${e}} =`;
            break
        }
        b /= e, c /= e, b > c && (d += ` {${parseInt(b / c)}}`, b %= c), d += 0 == b ? `$$` : `\\frac{${b}}{${c}}$$`, $('#simplifit').html(d), MathJax.Hub.Queue(['Typeset', MathJax.Hub]), $('#simplifit').css('visibility', 'visible')
    }), $('#btnresult').click(function () {
        $('.area').hasClass('show_area') || $('.area').toggleClass('show_area')
    });
</script>
@include('template.mathjs')

@endpush