@extends('layouts.app')
@push('style')

<style>
    input {
        color: black;
    }

    #F1:checked ~ #a_side {
        pointer-events: none;
        background-color: navajowhite;
    }

    #F2:checked ~ #b_side {
        pointer-events: none;
        background-color: navajowhite;
    }

    #F3:checked ~ #c_side {
        pointer-events: none;
        background-color: navajowhite;
    }
</style>
@endpush
@section('content')

    <div class="container-fluid">
        <div class="col-xs-12 col-md-9">
            <h1 class="calc-header"> @lang('calc.Pythagorean theorem')</h1>
            <div class=" col-xs-12 col-md-8 col-md-offset-2 calc calc-form">
                <h4 class="text-center">@lang('calc.pythagorean choise')
                </h4>
                <hr>
                <form class="col-xs-6 col-md-4">
                    <div class="form-group">
                        <input checked type="radio" id="F1" name="pth"><span> BC - a</span>
                        <input class="col-xs-6 col-md-12" type="text" id="a_side">
                    </div>
                    <div class="form-group">
                        <input type="radio" id="F2" name="pth"><span> AC - b</span>
                        <input class="col-xs-6 col-md-12" type="text" id="b_side">
                    </div>
                    <div class="form-group">
                        <input type="radio" id="F3" name="pth"><span> AB - c</span>
                        <input class="col-xs-6 col-md-12" type="text" id="c_side">
                    </div>
                </form>
                <img class="col-xs-6  col-sm-4 col-md-5 col-md-offset-1"
                     src="{{asset('images/math/triunghi_dreptunghic.png')}}">
            </div>
            <div id="result" class="col-xs-12 col-md-8 col-md-offset-2 calc-form "
                 style="min-height: 0px;margin-top: 15px;">


            </div>
            @include('template.show_theory')

        </div>

        @include('baners.right_banner')
    </div>
@endsection
@push('script')
<script>
    $(document).ready(function(){$('#a_side').change(function(){pythagorasCalc()}),$('#b_side').change(function(){pythagorasCalc()}),$('#c_side').change(function(){pythagorasCalc()})});function pythagorasCalc(){var a,b;!0==document.getElementById('F1').checked?(a=document.getElementById('a_side'),b=round(Math.pow(Math.pow(getFieldFloatValue('c_side'),2)-Math.pow(getFieldFloatValue('b_side'),2),0.5),5),answer_html=` $\${a} = \\sqrt{c^2-b^2}=\\sqrt{${getFieldFloatValue('c_side')}^2-${getFieldFloatValue('b_side')}^2}=${b} $$`):document.getElementById('F2').checked?(a=document.getElementById('b_side'),b=round(Math.pow(Math.pow(getFieldFloatValue('c_side'),2)-Math.pow(getFieldFloatValue('a_side'),2),0.5),5),answer_html=` $\${b} = \\sqrt{c^2-a^2}=\\sqrt{${getFieldFloatValue('c_side')}^2-${getFieldFloatValue('a_side')}^2}=${b} $$`):document.getElementById('F3').checked&&(a=document.getElementById('c_side'),b=round(Math.pow(Math.pow(getFieldFloatValue('a_side'),2)+Math.pow(getFieldFloatValue('b_side'),2),0.5),5),answer_html=` $\${c} = \\sqrt{a^2+b^2}=\\sqrt{${getFieldFloatValue('a_side')}^2+${getFieldFloatValue('b_side')}^2}=${b} $$`),a.value=isNaN(b)?'-':b,isNaN(b)||($('#result').html(answer_html),MathJax.Hub.Queue(['Typeset',MathJax.Hub]))}function getFieldFloatValue(a){return parseFloat(document.getElementById(a).value.replace(',','.'))}function round(a,b){return X=a*Math.pow(10,b),X=Math.round(X),X/Math.pow(10,b)}
</script>
@include('template.mathjs')

@endpush