@extends('layouts.app')
@push('style')
<style>
    select, textarea, input[type="text"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .inputbox {
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555555;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #cccccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }

    .proces > div input {
        width: 100px;
        margin-left: 15px;
        margin-bottom: 15px;
    }

    .proces > div {
        /*background-color: #1b6d85;*/
        padding-top: 15px;
        border-radius: 15px;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid" style="min-height: 80vh">
        <div class="col-md-9">
            <div class="col-md-7 col-md-offset-2 proces">
                <h3 class="calc-header">{{$page->name}}</h3>
                <span id="precentage_c">

                </span>
                <div class="calc-form">
                    <span style="font-size: 18px; color: white;margin-left: 5px">@lang('calc.what is')</span>
                    <input id="procent_1" type="text">
                    <span  style="font-size: 18px; color: white;margin-left: 5px"> % @lang('calc.of')</span>
                    <input id="value_1" type="text">

                    <button id="precentage" class="btn btn-success">@lang('calc.answer')</button>
                </div>
                <br>
                <h3 class="calc-header">@lang('calc.Percentage Calculator in Common Phrases')</h3>
                <span id="precentage_common">

                </span>
                <div class="calc-form"><input id="procent_2" type="text"><span
                            style="font-size: 18px; color: white;margin-left: 5px">@lang('calc.is')</span>
                    <input id="value_2" type="text"><span style="font-size: 18px; color: white;margin-left: 5px">% @lang('calc.of what')</span>

                    <button id="precentage_inverse" class="btn btn-success">@lang('calc.answer')</button>
                </div>
                <div class="calc-form"><input id="value_3" type="text"><span
                            style="font-size: 18px; color: white;margin-left: 5px"> @lang('calc.is what % of')</span>
                    <input id="value_4" type="text">

                    <button id="precentage_inverse_1" class="btn btn-success">@lang('calc.answer')</button>
                </div>

                <br>
            </div>
            @include('template.show_theory')
        </div>
        @include('baners.right_banner')
    </div>

@endsection

@push('script')
@include('template.mathjs')
<script>
    $(document).ready(function () {
        $('#precentage').click(function () {
            var procent = parseFloat($('#procent_1').val());
            var value = parseFloat($('#value_1').val());
            procent = procent /100;
            var result = procent * value;
            var answer_html = `<h3>${result} @lang('calc.is') ${procent*100}%  @lang('calc.of') ${value}</h3><p></p>`;
            $('#precentage_c').html(answer_html);
            MathJax.Hub.Queue(['Typeset',MathJax.Hub])
        });
        $('#precentage_inverse').click(function () {
            var procent = parseFloat($('#procent_2').val());
            var value = parseFloat($('#value_2').val());
            value = value /100;
            var result =procent/value ;
            var answer_html = `<h3>${procent} @lang('calc.is') ${value*100} % @lang('calc.of') ${result} </h3><p></p>`;
            $('#precentage_common').html(answer_html);
            MathJax.Hub.Queue(['Typeset',MathJax.Hub])
        });
        $('#precentage_inverse_1').click(function () {

            var first = parseFloat($('#value_3').val());
            var second = parseFloat($('#value_4').val());
            var result = (first / second) * 100;
            var answer_html = `<h3>${first} @lang('calc.is') ${result} % @lang('calc.of') ${second}</h3><p></p>`;
            $('#precentage_common').html(answer_html);
            MathJax.Hub.Queue(['Typeset',MathJax.Hub])
        });
    });

</script>
@endpush

