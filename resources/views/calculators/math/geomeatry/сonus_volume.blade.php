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
            <div class="col-xs-12 col-md-8 col-md-offset-2 calc-form">
                <div class="col-xs-12">
                    <input checked type="radio" id="by_radius" name="type">
                    <label for="by_radius">@lang('calc.Calculate by height and radius')</label>
                </div>
                <div class="col-xs-12">
                    <input type="radio" id="by_area" name="type">
                    <label for="by_area">@lang('calc.Calculate by area and height')</label>
                </div>
                <div class="col-xs-8 col-md-6 ">

                    <div class="form-group">
                        <lable for="height">h =</lable>
                        <input type="text" id="height">
                    </div>
                    <div class="form-group">

                        <lable for="radius">r =</lable>
                        <input type="text" id="radius">
                    </div>
                    <a id="calculate" href="#result" class="btn btn-success">@lang('calc.answer')</a>

                </div>
                <img class="col-xs-4 col-md-4 col-md-offset-1" src="{{asset('images/math/conus.png')}}">

            </div>
            <div id="result" class="col-xs-12 col-md-8 col-md-offset-2 calc-form "
                 style="margin-top: 15px;visibility:hidden">


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

    $('#calculate').click(function (event) {
        let radio = $('input[name="type"]:checked')[0];
        let html_answer;
        let radius = parseFloat($('#radius').val());
        let height = parseFloat($('#height').val());
        if (radio.id == 'by_radius') {
            let answer = Math.round(1 / 3 * Math.PI * Math.pow(radius, 2) * height * 100) / 100;
            answer.toFixed(2);
            html_answer = `$\${V}={\\frac{1}{3}}{π}{r}^2{h} =
            {\\frac{1}{3}}{3.14}*{${radius}}^2*{${height}} = {${answer}}$$`;
        } else if (radio.id == 'by_area') {
            let answer = Math.round(1 / 3 * radius * height * 100) / 100;
            answer.toFixed(2);
            html_answer = `$\${V}={\\frac{1}{3}}{S}{h} =
            {\\frac{1}{3}}*{${radius}}^2*{${height}} = {${answer}}$$`;

        }
        $('#result').html(html_answer);
        MathJax.Hub.Queue(['Typeset', MathJax.Hub]);
        $('#result').css('visibility', 'visible');
        event.preventDefault();
        let id = $(this).attr('href'),
            top = $(id).offset().top - 100;
        $('body,html').animate({scrollTop: top}, 1500);
    });
</script>
@include('template.mathjs')
@endpush
