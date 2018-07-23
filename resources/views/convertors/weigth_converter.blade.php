@extends('layouts.app')
@push('style')
<link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">


@endpush
@section('content')
    @php
        $values = ['grams', 'ounces', 'pounds']

    @endphp
    <div class="container-fluid">
        <div class="col-md-9 col-xs-12">

            <div class="row text-center">
                <h1 class="calc-header ">{{$page->name}}</h1>

            </div>
            <div style="margin-top: 20px;padding: 15px 0" class="col-xs-12 col-md-8 col-md-offset-2 calc-form">
                <div class="col-md-12" style="display: flex;align-items: center; justify-content: center">
                    <div class="col-md-3" style="margin-top: 25px">
                        <input onkeypress="convertion()" id="input_value" class="col-xs-11">
                    </div>
                    <div class="col-xs-11 col-md-3">
                        <div class="col-md-3 text-center" style="width: 100%"> @lang('value.from')</div>
                        <select id="convert_from"  class="form-control select2">
                            @foreach($values as $value)
                                <option value="{{$value}}">@lang('value.'.$value)</option>
                            @endforeach
                        </select>
                        <div class="col-md-3 text-center" style="width: 100%"> @lang('value.to')</div>
                        <select id="convert_to" class="col-xs-11 col-md-3 form-control select2">
                            @foreach($values as $value)
                                <option value="{{$value}}">@lang('value.'.$value)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3" style="margin-top: 25px">
                        <input id="output_value" class="col-xs-11">
                    </div>

                </div>
                <form class="col-xs-12" style="margin-top: 20px">
                    @foreach($values as $value)
                        <div id="conv" class="col-xs-6 col-md-4">
                            <label for="{{$value}}">@lang('value.'.$value)</label>
                            <input onchange="totalConvertion()" class="col-xs-12" name="{{$value}}" id="{{$value}}">
                        </div>
                    @endforeach
                </form>
            </div>
                        {{--@include('template.show_theory')--}}
        </div>
        @include('baners.right_banner')

    </div>

@endsection
@push('script')
<script src="{{asset('public/js/converter/convert.js')}}"></script>
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $('#convert_to').change(function () {
        convertion()
    });
    $('#convert_from').change(function () {
        convertion()
    });
    function convertion() {
        let input = parseFloat($('#input_value').val());

        let from = $('#convert_from').val();
        let to =$('#convert_to').val();

        let output = convert(input.toString()).measure(from.toString()).to(to.toString());
        $('#output_value').val(output.toFixed(8))
    }
    function totalConvertion() {

        let inputs = $('form.col-xs-12').find('input[name]');
        for(let item in inputs){
            if($(inputs[item]).attr('id') ==$(event.target).attr('id') ){
                continue
            }
            let conv_result = convert($(event.target).val().toString()).measure($(event.target).attr('id').toString()).to($(inputs[item]).attr('id').toString());
            $(inputs[item]).val(conv_result.toFixed(8));
        }
    }
    $('.select2').select2();
</script>
@endpush