@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    <div class="col-md-9">
        <div class="row">
            <div class="form-group col-lg-6 col-md-offset-3">
                <label for="mot_term">Mortgage term</label>
                <select class="form-control" name="desterm" id="mot_term">
                    <option value="0" selected="">PLEASE CHOOSE</option>
                    <option value="6">6 Months</option>
                    <option value="12">1 Year</option>
                    <option value="24">2 Years</option>
                    <option value="36">3 Years</option>
                    <option value="60">5 Years</option>
                    <option value="84">7 Years</option>
                    <option value="120">10 Years</option>
                </select>
            </div>
            <div class="form-group col-lg-6 col-md-offset-3">
                <label for="pfreq">Payment frequency</label>
                <select class="form-control" name="PFREQ" id="pfreq">
                    <option value="0" selected="">PLEASE CHOOSE</option>
                    <option value="12">Monthly</option>
                    <option value="24">Semi-Monthly</option>
                    <option value="26">Bi-Weekly</option>
                    <option value="52">Weekly</option>
                </select>
            </div>
            <div class="form-group col-lg-6 col-md-offset-3">
                <label for="amort">Monthly Heating Costs/Condo Fees (est.):</label>
                <input type="number" class="form-control" id="amort" placeholder="1 to 40">
            </div>
            <div class="form-group col-lg-6 col-md-offset-3">
                <label for="mortage">Min. Monthly Payments for Loans/Credit Cards:</label>
                <input type="number" class="form-control" id="mortage" placeholder="10,000 to 1,000,000,000" >
            </div>
            <div class="form-group col-lg-6 col-md-offset-3">
                <label for="intrate">Monthly Secondary Financing Payment:</label>
                <input type="number" class="form-control" id="intrate" placeholder="0.1 to 25">
            </div>

        </div>
        <div class="form-group col-md-offset-3 btn">
            <input type="button" class="btn btn-block" id="calculate" value="calculate">
        </div>
        <div class=" col-md-6 col-md-offset-3">
            <p>Your Mortgage Analysis:</p>

            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <span class="label label-primary">Mortgage Payment</span>
                    <input type="text" class="form-control" name="mainpay" id="mainpay">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <span class="label label-primary">Mortgage Balance Remaining After</span>
                </div>
            </div>

            <div class="input-group">
                <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;1 Year</span>
                <input type="text" class="form-control col-xs-12 col-sm-6" name="mainyr1" id="mainyr1">
            </div>

            <div class="input-group">
                <span class="input-group-addon">&nbsp;&nbsp;2 Years</span>
                <input type="text" class="form-control col-xs-12 col-sm-6" name="mainyr2" id="mainyr2">
            </div>

            <div class="input-group">
                <span class="input-group-addon">&nbsp;&nbsp;3 Years</span>
                <input type="text" class="form-control col-xs-12 col-sm-6" name="mainyr3" id="mainyr3">
            </div>

            <div class="input-group">
                <span class="input-group-addon">&nbsp;&nbsp;5 Years</span>
                <input type="text" class="form-control col-xs-12 col-sm-6" name="mainyr5" id="mainyr5">
            </div>

            <div class="input-group">
                <span class="input-group-addon">10 Years</span>
                <input type="text" class="form-control col-xs-12 col-sm-6" name="mainyr10" id="mainyr10">
            </div>


        </div>

    </div>
</div>
@endsection
@push('script')
<script>
    $("#calculate").click(function () {
        var mot_term = parseFloat($("#mot_term").val());
        var freq = parseFloat($("#pfreq").val());
        var amort = parseFloat($("#amort").val());
        var mortgage = parseFloat($("#mortage").val());
        var intrate = parseFloat($("#intrate").val());
        var payment = calcPay(mortgage, amort, intrate, 2, freq);
        $("#mainpay").val('$' +  Math.round(payment*100)/100);
        $("#mainyr1").val('$' +  Math.round(calcBal(mortgage,intrate,2,freq,payment,(12/(12/freq)))*100)/100);
        $("#mainyr2").val('$' +  Math.round(calcBal(mortgage,intrate,2,freq,payment,(24/(12/freq)))*100)/100);
        $("#mainyr3").val('$' +  Math.round(calcBal(mortgage,intrate,2,freq,payment,(36/(12/freq)))*100)/100);
        $("#mainyr5").val('$' +  Math.round(calcBal(mortgage,intrate,2,freq,payment,(60/(12/freq)))*100)/100);
        $("#mainyr10").val('$' +  Math.round(calcBal(mortgage,intrate,2,freq,payment,(120/(12/freq)))*100)/100);

    });
    function calcPay(MORTGAGE, AMORT, INRATE, COMPOUND, FREQ){
        var compound = COMPOUND/12;
        var monTime = AMORT * 12;
        var RATE = (INRATE*1.0)/100;
        var yrRate = RATE/COMPOUND;
        var rdefine    = Math.pow((1.0 + yrRate),compound)-1.0;
        var PAYMENT = (MORTGAGE*rdefine * (Math.pow((1.0 + rdefine),monTime)))/  ((Math.pow((1.0 + rdefine),monTime)) - 1.0);
        if(FREQ==12){
            return PAYMENT;}
        if(FREQ==26||FREQ==24){
            return PAYMENT/2.0;}
        if(FREQ==52){
            return PAYMENT/4.0;}
    }
    function calcBal(mortgage,intrate,compound,freq,payment,term){
        rdefine = calcRdefine(intrate,compound, freq);
        return (mortgage*(Math.pow((1.0 + rdefine),(term)))) -  ((payment * ((Math.pow((1.0 + rdefine),(term))) - 1.0))/rdefine);
    }

    function calcRdefine(intrate,compound, freq){
        return Math.pow((1.0 + ((intrate/100)/compound)),(compound/freq))-1.0;}
</script>
@endpush
