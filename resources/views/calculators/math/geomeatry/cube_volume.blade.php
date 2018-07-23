@extends('layouts.app')
@push('style')
<style>
    input {
        color: black !important;
    }

    .calc-form {
        padding-top: 15px;
    }
</style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="col-xs-12 col-md-9">
            <div ><h1 class="calc-header">{{$page->name}}</h1></div>
            <div class="col-md-6 col-md-offset-3 calc-form">
                <div class="col-md-6">
                    <hr>
                    <label for="val">d = </label>
                    <input style="width: 100px" name="value" id="val">
                    <span id="calculate" class="btn btn-success">@lang('calc.answer')</span>
                    <div id="result" style="display: none">

                    </div>
                </div>
                <img src="{{asset('images/math/cube.png')}}">

            </div>
            @include('template.show_theory')
        </div>
        @include('baners.right_banner')
    </div>
@endsection
@push('script')
<script>
    $('#calculate').click(function () {
        let answer = parseFloat(Math.pow($('#val').val(),3).toFixed(2));
        answer_html = `$\${V}={d}^3=${answer}$$`;
        $('#result').html(answer_html);
        $('#result').css('display','block');
        MathJax.Hub.Queue(['Typeset',MathJax.Hub]);
    });
</script>
@include('template.mathjs')
@endpush
