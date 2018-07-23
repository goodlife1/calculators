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
            <div class="col-xs-12 col-md-6 col-md-offset-3 calc-form">
                <div class="row"><p class="text-center">@lang('calc.circle-enter values')</p></div>
                <div class="col-xs-6 col-md-5 ">
                    <div class="form-group">

                        <hr>
                        <select name="name" id="select_id" class="form-control">
                            <option value="A">Area</option>
                            <option value="C">Circumference</option>
                            <option value="r">Radius</option>
                        </select>
                        <input style="margin-top: 15px" type="text" id="radius" placeholder="Value..">
                    </div>
                    <span id="calculate" class="btn btn-success">@lang('calc.answer')</span>

                </div>
                <img class="col-xs-6 col-md-6 col-md-offset-1" src="{{asset('images/math/circle_volume.png')}}">
            </div>
            <div id="result" class="col-xs-12 col-md-8 col-md-offset-2 calc-form "
                 style="min-height: 0px;margin-top: 15px; display: none">
            </div>
            @include('template.show_theory')
        </div>
        @include('baners.right_banner')
    </div>
@endsection
@push('script')
<script>

    $('#calculate').click(function () {
        let type = $('#select_id').val();
        let value = parseFloat($('#radius').val());
        let html_answer, area, cercumferince, radius,volume;

        if (type == 'A') {
            radius = (Math.sqrt(value / Math.PI)).toFixed(3);
            cercumferince = (2 * Math.PI * radius).toFixed(3);
            html_answer = `
            $\${r} =\\sqrt{A/π}= \\sqrt{${value}/3.14} = ${radius}$$
            $\${d} = 2r = ${radius * 2}$$
            $\${C} = 2πr = 2*3.14*${radius} = ${cercumferince} $$
    `;
//            $\${v} = \\frac{3}{4}πr^3 = \\frac{3}{4}*3.14*${radius}^3 = ${volume} $$


        } else if (type == 'C') {
            radius = (value / 2 * Math.PI).toFixed(3);
            area = (Math.PI * Math.pow(radius,2)).toFixed(3);
            html_answer = `
            $\${r} ={C}/2π = ${value}/2*3.14 = ${radius} $$
            $\${d} = 2r = ${radius * 2}$$
            $\${A} = πr^2 = 3.14*${radius}^2 = ${area} $$


    `;
            //            $\${v} = \\frac{3}{4}πr^3 = \\frac{3}{4}*3.14*${radius}^3 = ${volume} $$
        } else if (type == 'r') {
            area = (Math.PI * Math.pow(value, 2)).toFixed(3);
            cercumferince = (2 * Math.PI * value).toFixed(3);
            html_answer = `
            $\${A} =π{r^2} = 3.14*${value}^2 = ${area} $$
            $\${d} = 2r = ${value * 2}$$
            $\${C} = 2πr = 2*3.14*${value} = ${cercumferince} $$

    `;
        }
//            $\${V} = \\frac{3}{4}πr^3 = \\frac{3}{4}*3.14*${value}^3 = ${volume} $$

        $('#result').html(html_answer);
        MathJax.Hub.Queue(['Typeset', MathJax.Hub]);
        $('#result').css('display', 'block');

    });
</script>
@include('template.mathjs')
@endpush

