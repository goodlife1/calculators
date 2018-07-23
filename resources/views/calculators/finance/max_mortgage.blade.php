@extends('layouts.app')
@section('content')
    <div class="container-fluid center-block">
        <div class="container">
            <div class="row">
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="total_incom">Annual Family Income:</label>
                    <input type="number" class="form-control" id="total_incom"  placeholder="10,000 to 2,500,000">
                </div>
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="pro_tax">Annual Property Taxes (est.):</label>
                    <input type="number" class="form-control" id="pro_tax" placeholder="100 to 50,000">
                </div>
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="pro_heat">Monthly Heating Costs/Condo Fees (est.):</label>
                    <input type="number" class="form-control" id="pro_heat" placeholder="20 to 1,500">
                </div>
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="debt">Min. Monthly Payments for Loans/Credit Cards:</label>
                    <input type="number" class="form-control" id="debt" placeholder="0 to 5000" >
                </div>
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="second">Monthly Secondary Financing Payment:</label>
                    <input type="number" class="form-control" id="second" placeholder="0 to 5000">
                </div>
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="rate">Interest Rate:</label>
                    <input type="number" class="form-control" id="rate"  placeholder="0.1% to 25%">
                </div>
            </div>
            <div class="form-group col-md-offset-3 btn">
                <input type="button" class="btn btn-block" id="calculate" value="calculate">
            </div>
            <div class="form-group">
                <div class=" col-lg-3 col-md-offset-3">
                    <label for="rate">Maximum Mortgage:</label>
                    <input type="text" class="form-control" id="max_mortage">
                </div>
                <div class=" col-lg-3 ">
                    <label for="rate">Monthly Payment:</label>
                    <input type="text" class="form-control" id="monthly_payment">
                </div>
            </div>

        </div>
    </div>


    @endsection

@push('script')
<script>
    function roundPen(number)
    {
        if(number > 0){
            pennies = number*100;
            pennies = Math.round(pennies);
            strPennies = "" + pennies;
            len = strPennies.length;

            return strPennies.substring(0, len - 2) + "." + strPennies.substring(len -2, len);
        }
        else return 0;
    }
    $("#calculate").click(function () {
        var total_incom = $("#total_incom").val();
        var pro_tax = $("#pro_tax").val();
        var pro_heat =$("#pro_heat").val()*12;
        var debt = $("#debt").val()*12;
        var second = $("#second").val()*12;
        var rate = $("#rate").val()/100;
        var compound = 2/12;
        var mon_time = 25 * 12;
        var year_rate = rate/2;

        var rdefine    = Math.pow((1.0 + year_rate),compound)-1.0;
        var purchcompound = Math.pow((1.0 + rdefine),mon_time);
        var maxgdsr =.32;
        var maxtdsr =.42;

        var GDSPAY = (maxgdsr*total_incom) - pro_tax - pro_heat - second;
        var TDSPAY = (maxtdsr*total_incom) - pro_tax - pro_heat - second - debt;
        var PAYMENT = (GDSPAY<TDSPAY) ? GDSPAY/12 : TDSPAY/12;
        var MORTGAGE = (0 +((PAYMENT*(purchcompound-1.0))/rdefine))/purchcompound;

        $("#max_mortage").val("$"+roundPen(MORTGAGE));
        $("#monthly_payment").val("$"+roundPen(PAYMENT));
    });
</script>

@endpush