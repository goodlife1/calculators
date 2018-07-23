@extends('layouts.app')
@push('style')
<style>
    input {
        color: black !important;
        margin-bottom: 2px;
        max-width: 100px;
    }

    .calc-form {
        padding-top: 15px;
    }
</style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="col-xs-12 col-md-9">
            <div><h1 class="calc-header">{{$page->name}}</h1></div>
            <div class="col-md-8 col-md-offset-2 calc-form">
                <div class="col-md-6">
                    <div class="row">
                        <input checked type="radio" id="by_radius" name="type">
                        <label for="by_radius">@lang('calc.Calculate by height and radius')</label>
                    </div>
                    <div class="row">
                        <input type="radio" id="by_area" name="type">
                        <label for="by_area">@lang('calc.Calculate by area and height')</label>
                    </div>
                    <div class="form-group">
                        <lable for="height">h =</lable>
                        <input type="text" id="height">
                    </div>
                    <div class="form-group">

                        <lable for="radius">r =</lable>
                        <input type="text" id="radius">
                    </div>
                    <span id="calculate" class="btn btn-success">@lang('calc.answer')</span>
                    <div id="result" style="display: none">

                    </div>
                </div>
                <img class="hidden-xs col-md-3 col-md-offset-1" style="height: 200px" src="{{asset('images/math/cylinder.png')}}">

            </div>
            @include('template.show_theory')
        </div>
        @include('baners.right_banner')
    </div>
@endsection
@push('script')
<script>
    $('input[name="type"]').change(function () {
        if (this.id == 'by_radius') {
            $('lable[for="radius"]').html('r =');

        } else {
            $('lable[for="radius"]').html('s =');
        }
    });

    $('#calculate').click(function () {
        var radio = $('input[name="type"]:checked')[0];
        let html;
        if (radio.id == 'by_radius') {
            var radius = parseFloat($('#radius').val());
            var height = parseFloat($('#height').val());
            var answer = Math.round(Math.PI * Math.pow(radius, 2) * height * 100) / 100;
             html = `$\${V} = {π}{r}^2{h} = 3.14 * {${radius}}^2*{${height}} = {${answer}}$$`;
        } else if (radio.id == 'by_area') {
            var radius = parseFloat($('#radius').val());
            var height = parseFloat($('#height').val());
            var answer = Math.round(radius * height * 100) / 100;
            html=`$\${V} = {S}*{h} = {${radius}}*{${height}}= {${answer}}$$`;
            $('#res').html(answer);
        }

        $('#result').html(html);
        MathJax.Hub.Queue(['Typeset',MathJax.Hub]);

        $('#result').css('display', 'block');

    });

</script>
@include('template.mathjs')

@endpush
