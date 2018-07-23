@extends('layouts.app')
@push('style')
<style>
    .calc-form{
        padding:20px;

    }
    .nav-tabs>li>a{
    background-color: whitesmoke;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid ">
        <div class="col-xs-12 col-md-9">
            <div class="col-md-12 calc-header"><h2>Car Payment</h2></div>

            <div class="col-md-10 col-md-offset-1 calc-form">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Calculate my paymant</a></li>
                <li><a data-toggle="tab" href="#menu1">My maximum loan amount</a></li>
            </ul>

            <div class="tab-content ">
                <div id="home" class="tab-pane fade in active">
                    <form id="contact-form">
                    <div class="row">
                        <div class="form-group col-md-6 ">
                            <label for="p_vehicle">Price of your new vehicle</label>
                            <input type="number" class="form-control" name="p_vehicle" id="p_vehicle" placeholder="0 to 200,000">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="trade_in">Value of your trade-in vehicle</label>
                            <input type="number" class="form-control" name="trade_in" id="trade_in" placeholder="0 to 200,000">
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="loan">Your existing vehicle loan balance:</label>
                            <input type="number" class="form-control" name="loan" id="loan" placeholder="0 to 200,000">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="down_pay">Your down payment</label>
                            <input type="number" class="form-control" name="down_pay" id="down_pay" placeholder="0 to 200,000">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="durat_loan">Duration of your loan</label>
                            <input type="number" class="form-control" name="durat_loan" id="durat_loan" placeholder="0 to 96">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="s_tax">Provincial saales tax</label>
                            <input type="number" class="form-control" name="s_tax" id="s_tax" placeholder="0% to 15%">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="inter_r">Expected interest rate</label>
                            <input type="number" class="form-control" name="inter_r" id="inter_r" placeholder="0% to 15%">
                        </div>

                    </div>
                    <div class="form-group col-md-offset-3 btn">
                        <input type="submit" class="btn btn-block" id="calculate" value="calculate">
                    </div>
                    <div class="form-group">
                        <div class=" col-md-12">
                            <label for="target">Your total amount to be financed will be</label>
                            <input type="text" class="form-control" id="target">
                        </div>
                        <div class=" col-md-12">
                            <p>With the following payments</p>
                            <table class="table" >
                                <thead>
                                <tr>
                                    <th>Payment Frequency</th>
                                    <th>Payment Amount</th>
                                    <th>Total Interest to be Paid over the Duration of the Loan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Monthly</td>
                                    <td id="mp">0</td>
                                    <td id="timp">0</td>
                                </tr>
                                <tr>
                                    <td>Bi-weekly</td>
                                    <td id="bwp">0</td>
                                    <td id="tibwp">0</td>
                                </tr>
                                <tr>
                                    <td>Weekly</td>
                                    <td id="wp">0</td>
                                    <td id="tiwp">0</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
                <div id="menu1" class="tab-pane fade">
                            <form action="#">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="payment">Your monthly payment</label>
                                        <input type="number" class="form-control" id="payment" min="0" max="1500" placeholder="0 to 1500">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="trade_in">Value of tour trade-in:</label>
                                        <input type="number" class="form-control" id="trade_in_1" min="0" max="100000" placeholder="0 to 100,000">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="down_pay">Your down payment</label>
                                        <input type="number" class="form-control" id="down_pay_1" min="0" max="100000" placeholder="0 to 100,000">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="vehicle">Your existing vehicle loan balance:</label>
                                        <input type="number" class="form-control" id="vehicle" min="0" max="100000" placeholder="0 to 100,000">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="s_rate">Provincial sales rate</label>
                                        <input type="number" class="form-control" id="s_rate" min="0" max="15" placeholder="0% to 15%">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="i_rate">Expected interest rate</label>
                                        <input type="number" class="form-control" id="i_rate" min="0" max="15" placeholder="0% to 15%">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dur_loan">Duration of your loan:</label>
                                        <input type="number" class="form-control" id="dur_loan" min="0" max="96" placeholder="0 to 96 mo">
                                    </div>

                                </div>
                                <div class="form-group col-md-offset-3 btn">
                                    <input type="submit" class="btn btn-block" id="calculate_2" value="calculate">
                                </div>
                            </form>
                            <div class="form-group">
                                <div class=" col-md-6">
                                    <label for="target_1">Maximum Mortgage:</label>
                                    <input type="text" class="form-control" id="target_1">
                                </div>
                                <div class=" col-md-6 ">
                                    <label for="total">Monthly Payment:</label>
                                    <input type="text" class="form-control" id="total">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @include('template.show_theory')
            </div>
        @include('baners.right_banner')
            </div>



@endsection
@push('script')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script>
    $('#contact-form').validate({
        rules: {
            p_vehicle:{
                required:true,
                message:'jkj'
            },
            trade_in:{
                required:true
            },
            loan:{
                required:true
            },
            down_pay:{
                required:true
            },
            durat_loan:{
                required:true
            },
            s_tax:{
                required:true
            },
            inter_r:{
                required:true
            }
        },
        messages: {
            required: "Enter your firstname",
            lastname: "Enter your lastname",
//            username: {
//                required: "Enter a username",
//                minlength: jQuery.format("Enter at least {0} characters"),
//                remote: jQuery.format("{0} is already in use")
            },
        highlight: function (element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        submitHandler: function(form) {
            alert('asdf');
        },
        success: function (element) {

        }
    });

</script>

<script>
    $("#calculate").click(function () {

    });
    function PaymentAmountPeriod(period,args,taf) {
        var nper = args.durat_loan * period / 12;
        if (0 == args.inter_r)
            return Math.max(0, taf) / nper;
        var rate = args.inter_r / period / 100;
        return Math.max(0, taf) * (rate + rate / (Math.pow(1 + rate, nper) - 1))

    }
    function PaymentInterestPeriod(period,payment,args,taf) {
        return args.inter_r > 0 ? payment * period * (args.durat_loan / 12) - Math.max(0, taf) : 0;
    }
</script>

<script>
    $("#calculate_2").click(function () {
        var payment = $("#payment").val();
        var trade_in = $("#trade_in_1").val();
        var down_pay = $("#down_pay_1").val();
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
        $("#target_1").val( Math.round(tar_price * 100) / 100 );
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
        var numerator = 12 == period ? args.payment * args.dur_loan - args.vehicle + args.down_pay :
            args.payment * period * args.dur_loan / 12 - args.vehicle + args.down_pay;
        return numerator / (1 + args.s_rate / 100) + parseFloat(args.trade_in);
    }
</script>

@endpush