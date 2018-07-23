@extends('layouts.app')
@push('style')
<style>
    .calc-form{
        padding-top: 15px ;
    }
    .time_operation{
        width: 80px;
        margin-left: 5px;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="col-xs-12 col-md-9">
            <div class="col-md-12 calc-header">{{$page->name}}</div>
            <div class="col-md-10 col-md-offset-1 calc-form">
                <h4>@lang('other.Date diference')</h4>
                <hr>
                <label for="start">@lang('mortgage.start_date'):</label>
                <input id="start" name="start" type="date" placeholder="yyyy-mm-dd">

                <label for="end">@lang('other.end date'):</label>
                <input id="end" name="end" type="date" placeholder="yyyy-mm-dd">

                <button class="btn btn-success" type="button" onclick="calculateInterval()">@lang('calc.answer')</button>

                <p><label id="out1"></label></p>

                <p><label id="out2"></label></p>
            </div>
            <div class="col-md-10 col-md-offset-1 calc-form" style="margin-top: 15px">
                <h4>@lang('other.Add or subtract date')</h4>
<hr>

                <label >@lang('mortgage.start_date'):</label>
                <input id="date_to_add" name="start" type="date" placeholder="yyyy-mm-dd">
                <select id="operation">
                    <option selected value="add">+</option>
                    <option value="subtract">-</option>
                </select>
                <input id="years" name="start" class="time_operation"    type="number" placeholder="Years">
                <input id="mounth" name="start" class="time_operation"   type="number" placeholder="Month">
                <input id="weeck" name="start" class="time_operation"   type="number" placeholder="Weeks">
                <input id="days" name="start" class="time_operation"   type="number" placeholder="Days">

                <button type="button" class="btn btn-success" id="date_operation">@lang('calc.answer')</button>

                <p><label id="out3"></label></p>

            </div>
            @include('template.show_theory')
        </div>
        @include('baners.right_banner')
    </div>
    @endsection
@push('script')
<script src="{{asset('public/js/moment.js')}}"></script>

<script>

    Date.getFormattedDateDiff = function(date1, date2) {
        var b = moment(date1),
            a = moment(date2);
            moment.locale('ru');

        intervals = ['years','months','weeks','days'],
           date = intervals,
                @php
                    if (App::getLocale()=='ru'){
                    echo "date=['года','месяца','недели','дня'],";
                    }
                @endphp
            out = [];

        for(var i=0; i<intervals.length; i++){
            var diff = a.diff(b, intervals[i]);
            b.add(diff, intervals[i]);
            out.push(diff + ' ' + date[i]);
        }
        return out.join(', ');
    };
$('#date_operation').click(function () {
    let start_date = $('#date_to_add').val();
    let years = $('#years').val();
    let months = $('#mounth').val();
    let weeks = $('#weeck').val();
    let days = $('#days').val();
    let operation = $('#operation').val();

    let date = moment(start_date);
    date.locale('ru');
    if(operation == 'add'){
        date.add(years,'years');
        date.add(months,'months');
        date.add(weeks,'weeks');
        date.add(days,'days');
    }else if(operation=='subtract'){
        date.subtract(years,'years');
        date.subtract(months,'months');
        date.subtract(weeks,'weeks');
        date.subtract(days,'days');
    }
    console.log(date);
   $('#out3').html(date.calendar());
});
    function calculateInterval() {
        var start = new Date(document.getElementById('start').value),
            end   = new Date(document.getElementById('end').value);

        document.getElementById('out1').innerHTML
            = '@lang('other.time betwen') "' + start.toISOString().split('T')[0]
            + '" - "' + end.toISOString().split('T')[0] + '":<br/>'
            + Date.getFormattedDateDiff(start, end);
    }

    var today   = new Date(),
        newYear = new Date(today.getFullYear(), 0, 1),
        y2k     = new Date(2000, 0, 1);

    document.getElementById('out2').innerHTML
        = '@lang('other.Time since New Year'):<br/>' + Date.getFormattedDateDiff(newYear, today);

</script>
@endpush