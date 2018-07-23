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
                <div class="col-md-4">
                    <label for="a_side">Value a</label>
                    <input name="value" id="a_side">

                    <label for="b_side">Value b</label>
                    <input name="value" id="b_side">

                    <label for="c_side">Value c</label>
                    <input name="value" id="c_side">

                    <span id="calculate" class="btn btn-success">caluclate</span>
                    <div id="result" style="display: none">
                        <h4>V = <span id="res"></span></h4>
                    </div>
                </div>
                <img class="col-md-5 col-md-offset-1" src="{{asset('images/math/paral.png')}}">

            </div>
        </div>
        @include('baners.right_banner')
    </div>
@endsection
@push('script')
<script>
    $('#calculate').click(function () {
        var a = parseFloat($('#a_side').val());
        var b = parseFloat($('#b_side').val());
        var c = parseFloat($('#c_side').val());
        var answer = a * b * c;
        $('#res').html(answer);
        $('#result').css('display', 'block');

    });
</script>
@endpush
