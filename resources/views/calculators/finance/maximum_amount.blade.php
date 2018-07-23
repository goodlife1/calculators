@extends('layouts.app')
@section('content')

<div class="container-fluid center-block">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="payment">Your monthly payment</label>
                    <input type="number" class="form-control" id="payment" min="0" max="1500" placeholder="0 to 1500">
                </div>
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="trade_in">Value of tour trade-in:</label>
                    <input type="number" class="form-control" id="trade_in" min="0" max="100000" placeholder="0 to 100,000">
                </div>

                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="down_pay">Your down payment</label>
                    <input type="number" class="form-control" id="down_pay" min="0" max="100000" placeholder="0 to 100,000">
                </div>
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="vehicle">Your existing vehicle loan balance:</label>
                    <input type="number" class="form-control" id="vehicle" min="0" max="100000" placeholder="0 to 100,000">
                </div>
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="s_rate">Provincial sales rate</label>
                    <input type="number" class="form-control" id="s_rate" min="0" max="15" placeholder="0% to 15%">
                </div>
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="i_rate">Expected interest rate</label>
                    <input type="number" class="form-control" id="i_rate" min="0" max="15" placeholder="0% to 15%">
                </div>
                <div class="form-group col-lg-6 col-md-offset-3">
                    <label for="dur_loan">Duration of your loan:</label>
                    <input type="number" class="form-control" id="dur_loan" min="0" max="96" placeholder="0 to 96 mo">
                </div>

            </div>
            <div class="form-group col-md-offset-3 btn">
                <input type="submit" class="btn btn-block" id="calculate" value="calculate">
            </div>
        </form>
        <div class="form-group">
            <div class=" col-lg-3 col-md-offset-3">
                <label for="target">Maximum Mortgage:</label>
                <input type="text" class="form-control" id="target">
            </div>
            <div class=" col-lg-3 ">
                <label for="total">Monthly Payment:</label>
                <input type="text" class="form-control" id="total">
            </div>
        </div>

    </div>
</div>
@endsection
@push('script')
<script>
    $("#calculate").click(function () {
        var payment = $("#payment").val();
        var trade_in = $("#trade_in").val();
        var down_pay = $("#down_pay").val();
        var vehicle = $("#vehicle").val();
        var s_rate = $("#s_rate").val();
        var i_rate = $("#i_rate").val();
        var dur_loan = $("#dur_loan").val();
        var args = {
            'payment': parseFloat(payment),
            'trade_in': parseFloat(trade_in),
            "down_pay": parseFloat(down_pay),
            'vehicle': parseFloat(vehicle),
            "s_rate": parseFloat(s_rate),
            'i_rate': parseFloat(i_rate),
            'dur_loan': parseFloat(dur_loan)
        };
        var tar_price = targetPrice(12, args);
        var timp = TotalInterestDuePeriod(12,args,Math.max(0,tar_price));
        $("#target").val( Math.round(tar_price * 100) / 100 );
        $("#total").val( Math.round(timp * 100) / 100);
    });
    function targetPrice(period, args) {
        if (args.i_rate > 0) {
            return  TargetVehiclePricePeriodWithInterest(period, args);
        } else {
            return  TargetVehiclePricePeriodWithoutInterest(period, args);
        }
    }
    function TotalInterestDuePeriod(period, args, tvp) {
        return args.i_rate > 0 ? args.payment * period * (args.dur_loan / 12) - (tvp + (tvp - parseFloat(args.trade_in)) * args.s_rate / 100 - args.down_pay + args.vehicle - parseFloat(args.trade_in)) : 0;
    }
    function TargetVehiclePricePeriodWithInterest(period, args) {
        var irPeriod = args.i_rate / period / 100, base = 1 + irPeriod, exp = args.dur_loan * (period / 12);
        "12" == period && (exp = args.dur_loan);
        console.log(irPeriod);
        var power = Math.pow(base, exp);
        return (-(parseFloat(args.trade_in) * (irPeriod + irPeriod / (power - 1))) + args.payment / (irPeriod + irPeriod / (power
            - 1)) + (parseInt(args.trade_in) * (irPeriod + irPeriod / (power - 1)) + args.down_pay - args.vehicle)) *
            (1 / (1 + args.s_rate / 100)) + parseFloat(args.trade_in);

    }
    function TargetVehiclePricePeriodWithoutInterest(period, args) {
        alert("hjk");

        var numerator = 12 == period ? args.payment * args.dur_loan - args.vehicle + args.down_pay :
            args.payment * period * args.dur_loan / 12 - args.vehicle + args.down_pay;
        return numerator / (1 + args.s_rate / 100) + parseFloat(args.trade_in);
    }
</script>
@endpush