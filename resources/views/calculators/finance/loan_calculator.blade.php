@extends('layouts.app')
@push('style')
<style>
    .calc-form input {
        width: 20%;

    }
</style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="col-xs-12 col-md-9">
            <div class="col-md-12 calc-header">{{$page->name}}</div>

            <div class="col-md-8 col-md-offset-2">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">@lang('mortgage.pb Fixed Amount Periodically')</a>
                    </li>
                    <li><a data-toggle="tab" href="#menu1">@lang('mortgage.pb Predetermined Amount Due at Loan Maturity')</a></li>
                    <li><a data-toggle="tab" href="#menu2">@lang('mortgage.pb Lump Sum Due at Loan Maturity')</a>
                    </li>
                </ul>

                <div class="tab-content calc-form" style="margin-top: 25px;padding:10px 10px ">
                    <div id="home" class="tab-pane fade in active">
                        <div class="form-group" id="input1">
                            <input id="LoanAmount" class="form-control" size="7">

                            <label for="LoanAmount">@lang('mortgage.how mych to borrow') </label>
                        </div>
                        <div class="form-group">
                            <input id="InterestRate" class="form-control" placeholder="%" size="4">

                            <label for="InterestRate">@lang('mortgage.what annual interest rate') </label>

                        </div>
                        <div class="form-group">
                            <input class="form-control" id="Term" size="4">
                            <label for="term">@lang('mortgage.loan Term') </label>
                            <strong class="infoicon"> @lang('mortgage.months')</strong>

                        </div>

                        <input type="button" class="button" onclick="borrowingCosts()" value="@lang('calc.answer')">


                        <span id="Rresults"
                              style="width: 100%;display: flex;justify-content: center;margin-top: 15px"></span>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div id="input2" style="display: inline;">

                            <strong><span style="color:yellow;">@lang('mortgage.y curre loan')</span></strong><br>

                            <div class="form-group">
                                <input class="form-control" id="Term2" placeholder="months" style="width:150px">
                                <label for="Term2">@lang('mortgage.how many months are left?') </label>
                            </div>

                            <div class="form-group">
                                <input id="MonthlyPayment" class="form-control" style="width:150px">
                                <label for="MonthlyPayment">@lang('mortgage.how much do you repay per month?') </label>
                            </div>

                            <div class="form-group">
                                <input id="LoanAmount2" class="form-control" style="width:150px">
                                <label for="LoanAmount2">@lang('mortgage.what will it cost to pay off your existing loan now?')</label>
                            </div>
                            <strong><span style="color:yellow;">@lang('mortgage.your new loan')</span></strong><br>
                            <div class="form-group">
                                <input class="form-control" placeholder="%" id="InterestRate2" style="width:130px"></div>

                            <label for="InterestRate2">@lang('mortgage.the best interest rate you can get for a new loan?')</label>


                            <input type="button" class="button" onclick="switchingLoans()" value="@lang('calc.answer')">
                            <br><br>
                            <br> <br>
                        </div>
                        <span id="Rresults1"></span>

                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div id="input3" style="">

                        <span><strong>@lang('mortgage.afford to repay each month')</strong><input id="RepaymentAmount"
                                                                                                  size="4"><br><br></span>

                            <span><strong>@lang('mortgage.what annual interest rate') </strong><input id="InterestRate3"
                                                                                    size="3"><strong>%</strong></span><br><br>


                            <span><strong>@lang('mortgage.want to borrow for')</strong><input id="Term3"
                                                                                              size="3"> <strong>@lang('mortgage.months')</strong></span><br><br>


                            <input type="button" class="button" onclick="howMuch()" value="@lang('calc.answer')">
                            <br><br>
                            <br><br>

                        </div>
                        <span id="howMutch"></span>

                    </div>
                </div>
            </div>
@include('template.show_theory')
        </div>
        @include('baners.right_banner')
    </div>
@endsection
@push('script')
<script>$(document).on("click", ".infoicon", function (e) {
        e.preventDefault();
        $(this).next('.content').toggleClass('hide');
    });

    $(document).on("click", function (e) {
        if (!$(e.target).hasClass('infoicon')) {
            $('.content').addClass('hide');
        }
    });


    function addremoveClass(xyz) {

        $('#question_1, #question_2, #question_3').removeClass('inactiveoptions');
        switch (xyz) {
            case 'question_1':
                $('#question_2, #question_3').addClass('inactiveoptions');
                break;
            case 'question_2':
                $('#question_1, #question_3').addClass('inactiveoptions');
                break;
            case 'question_3':
                $('#question_1, #question_2').addClass('inactiveoptions');
                break;
        }
    }


    function formatCurrencyZeroDP(num) {
        num = num.toString().replace(/\$|\,/g, '');
        if (isNaN(num))
            num = "0";
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num * 100 + 0.50000000001);
        cents = num % 100;
        num = Math.floor(num / 100).toString();
        if (cents < 10)
            cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
            num = num.substring(0, num.length - (4 * i + 3)) + ',' +
                num.substring(num.length - (4 * i + 3));
        //return (((sign)?'':'-') + '$' + num + '.' + cents);
        return (((sign) ? '' : '-') + num + '.' + cents);
    }


    function formatCurrencyZeroDP(num) {
        num = num.toString().replace(/\$|\,/g, '');
        if (isNaN(num))
            num = "0";
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num * 100 + 0.50000000001);
        cents = num % 100;
        num = Math.floor(num / 100).toString();
        if (cents < 10)
            cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
            num = num.substring(0, num.length - (4 * i + 3)) + ',' +
                num.substring(num.length - (4 * i + 3));
        //return (((sign)?'':'-') + '$' + num + '.' + cents);
        return (((sign) ? '' : '-') + num);
    }


    function borrowingCosts() {

        var validated = true;

        //declare key variables
        var Loan = document.getElementById("LoanAmount").value;
        Loan = parseFloat(Loan.replace(/[^0-9.]/g, ''));

        if (isNaN(Loan) || (Loan == 0)) {
            document.getElementById("LoanAmount").style.border = "yellow solid 2px";
            validated = false;
        } else {
            document.getElementById("LoanAmount").style.border = "";
        }

        var Rate = document.getElementById("InterestRate").value;
        Rate = parseFloat(Rate.replace(/[^0-9.]/g, ''));

        if (isNaN(Rate)) {
            document.getElementById("InterestRate").style.border = "yellow solid 2px";
            validated = false;
        } else {
            document.getElementById("InterestRate").style.border = "";
        }

        var temp = document.getElementById("Term").value;
        temp = parseFloat(temp.replace(/[^0-9.]/g, ''));

        var Term = new Number(temp);
        Term = parseFloat(Term);

        if (isNaN(Term) || (Term == 0)) {
            document.getElementById("Term").style.border = "yellow solid 2px";
            validated = false;
        } else {
            document.getElementById("Term").style.border = "";
        }

        if (validated) {
            document.getElementById("LoanAmount").style.border = "";
            document.getElementById("InterestRate").style.border = "";
            document.getElementById("Term").style.border = "";

            //repayment amount
            var MonthlyRate = Rate / 1200;
            var TermMonths = Term * -1;
            var Multiplier = 1 + MonthlyRate;
            Multiplier = Math.pow(Multiplier, TermMonths);
            Multiplier = 1 - Multiplier;
            Multiplier = MonthlyRate / Multiplier;
            var RepaymentAmount = Loan * Multiplier;
            Loanid = "";
            range = "";
            if (Loan < 2000) {
                Loanid = "under";
                Range = "&pound;1,000 - &pound;1,999";
                anchor = "#1k2k";
            } else if (Loan < 3000) {
                Loanid = "premid";
                Range = "&pound;2,000 - &pound;2,999";
                anchor = "#2k3k";
            } else if (Loan < 5000) {
                Loanid = "mid";
                Range = "&pound;3,000 - &pound;5,000";
                anchor = "#3k5k";
            } else if (Loan < 7500) {
                Loanid = "over";
                Range = "&pound;5,000 - &pound;7,500";
                anchor = "#5k75k";
            } else if (Loan < 15000) {
                Loanid = "more";
                Range = "&pound;7,500 - &pound;15,000";
                anchor = "#75k15k";
            } else if (Loan < 25000) {
                Loanid = "moreover";
                Range = "&pound;15,000 - &pound;25,000";
                anchor = "#15k25k";
            } else {
                Loanid = "out";
                Range = "&pound;25,000+";
                anchor = "#25k";
            }

            //display

            var NewText = "";
            var interestWithComma = formatCurrencyZeroDP(((RepaymentAmount * Term) - Loan));
            var interest = interestWithComma.replace(/\,/g, '');
            var total = +Loan + +interest;

            var resultText = "<p>@lang('mortgage.To borrow')<span style='color: yellow;'> &pound;" + Loan + "</span>, @lang('mortgage.it will cost') <span style='color: yellow;'>  &pound;" + formatCurrencyZeroDP(RepaymentAmount) + "</span> @lang('/mortgage./month')<br /><br />";
            resultText = resultText + " @lang('mortgage.Over the life of the loan, this costs') <span style='color: yellow;'>  &pound;" + formatCurrencyZeroDP(((RepaymentAmount * Term) - Loan)) + "</span> @lang('mortgage.in interest')<br/><br/>";
            resultText = resultText + " @lang('mortgage.In total, over the') <span style='color: yellow;'>" + Term + "</span> @lang('mortgage.months of your loan, you’ll repay')<span style='color: yellow;'>  &pound;" + total + "</span></p>" + NewText;
        } else {
            var resultText = "<p>@lang('mortgage.Please insert values in every box')</p>";

        }
        document.getElementById("Rresults").innerHTML = resultText;
        document.getElementById("resultbox").style.display = "block";
        document.getElementById("bestbuy_presearch").style.display = "none";
    }

    function howMuch() {

        var validated = true;

        var RepaymentAmount = document.getElementById("RepaymentAmount").value;
        RepaymentAmount = parseFloat(RepaymentAmount.replace(/[^0-9.]/g, ''));

        if (isNaN(RepaymentAmount) || (RepaymentAmount == 0)) {
            document.getElementById("RepaymentAmount").style.border = "yellow solid 2px";
            validated = false;
        } else {
            document.getElementById("RepaymentAmount").style.border = "";
        }


        var Rate = document.getElementById("InterestRate3").value;
        Rate = parseFloat(Rate.replace(/[^0-9.]/g, ''));

        if (isNaN(Rate)) {
            document.getElementById("InterestRate3").style.border = "yellow solid 2px";
            validated = false;
        } else {
            document.getElementById("InterestRate3").style.border = "";
        }

        var temp = document.getElementById("Term3").value;
        temp = parseFloat(temp.replace(/[^0-9.]/g, ''));


        var Term = new Number(temp);
        Term = parseFloat(Term);

        if (isNaN(Term) || (Term == 0)) {
            document.getElementById("Term3").style.border = "yellow solid 2px";
            validated = false;
        } else {
            document.getElementById("Term3").style.border = "";
        }

        if (validated) {
            document.getElementById("RepaymentAmount").style.border = "";
            document.getElementById("InterestRate3").style.border = "";
            document.getElementById("Term3").style.border = "";
            var InterestRate = document.getElementById("InterestRate3").value;
            var MonthlyRate = Rate / 1200;
            var TermMonths = Term * -1;
            var Multiplier = 1 + MonthlyRate;
            Multiplier = Math.pow(Multiplier, TermMonths);
            Multiplier = 1 - Multiplier;
            Multiplier = MonthlyRate / Multiplier;
            var Loan = RepaymentAmount / Multiplier;
            var interestPaid = formatCurrencyZeroDP((RepaymentAmount * Term) - Loan);
            Loan = formatCurrencyZeroDP(Loan);
            //display
            var resultText = "<p>@lang('mortgage.Repaying') <span style='color: yellow;'>  &pound;" + formatCurrencyZeroDP(RepaymentAmount) + "</span>/@lang('mortgage.month, over') <span style='color: yellow;'>"
                + Term + "</span> @lang('mortgage.months'), <br />@lang('mortgage.you will be able to borrow') <span style='color: yellow;'>  &pound;"
                + formatCurrencyZeroDP(Loan) + "</span> <br/><br/> <span style='font-weight:normal'></p>";

        } else {
            var resultText = "<p>@lang('mortgage.Please insert values in every box')</p>";

        }
        document.getElementById("howMutch").innerHTML = resultText;
        document.getElementById("resultbox").style.display = "block";
        document.getElementById("bestbuy_presearch").style.display = "none";
    }


    function switchingLoans() {
        var validated = true;

        var Loan = document.getElementById("LoanAmount2").value;
        Loan = parseFloat(Loan.replace(/[^0-9.]/g, ''));

        if (isNaN(Loan) || (Loan == 0)) {
            document.getElementById("LoanAmount2").style.border = "yellow solid 2px";
            validated = false;
        } else {
            document.getElementById("LoanAmount2").style.border = "";
        }

        var Payment = document.getElementById("MonthlyPayment").value;
        Payment = parseFloat(Payment.replace(/[^0-9.]/g, ''));

        if (isNaN(Payment) || (Payment == 0)) {
            document.getElementById("MonthlyPayment").style.border = "yellow solid 2px";
            validated = false;
        } else {
            document.getElementById("MonthlyPayment").style.border = "";
        }

        var Rate = document.getElementById("InterestRate2").value;
        Rate = parseFloat(Rate.replace(/[^0-9.]/g, ''));

        if (isNaN(Rate)) {
            document.getElementById("InterestRate2").style.border = "yellow solid 2px";
            validated = false;
        } else {
            document.getElementById("InterestRate2").style.border = "";
        }

        var temp = document.getElementById("Term2").value;
        temp = parseFloat(temp.replace(/[^0-9.]/g, ''));

        var Term = new Number(temp);
        Term = parseFloat(Term);

        if (isNaN(Term) || (Term == 0)) {
            document.getElementById("Term2").style.border = "yellow solid 2px";
            validated = false;
        } else {
            document.getElementById("Term2").style.border = "";
        }
        if (validated) {

            var MonthlyRate = Rate / 1200;
            var TermMonths = Term * -1;
            var Multiplier = 1 + MonthlyRate;

            Multiplier = Math.pow(Multiplier, TermMonths);
            Multiplier = 1 - Multiplier;
            Multiplier = MonthlyRate / Multiplier;

            var RepaymentAmount = Loan * Multiplier;
            var TotalRepaymentAmount = RepaymentAmount * Term
            var repayment = Payment * Term;
            var final = repayment - TotalRepaymentAmount;

            document.getElementById("Rresults1").innerHTML = "<span style='color: yellow;'>  &pound;" + RepaymentAmount + "</span> - <span style='color: yellow;'>  &pound;" + formatCurrencyZeroDP(repayment) + "</span> = <span style='color: yellow;'>  &pound;" + formatCurrencyZeroDP(final) + "<span style='color: yellow;'>";

            if (final > 0) {


                var resultText = "<p> <span style=' font-weight:normal'><span style=\"font-weight:bold;\">@lang('mortgage.You CAN save by switching')</span><br/><br/>@lang('mortgage.Stick with your current deal and you will repay')<span style='color: yellow;'>  &pound;" + formatCurrencyZeroDP(Math.round(repayment)) + "</span><br/><br/>@lang('mortgage.Shift to the new deal and you will repay') <span style='color: yellow;'>  &pound;" + formatCurrencyZeroDP(Math.round(TotalRepaymentAmount)) + "</span><br/><br/><b>@lang('mortgage.Therefore you are') <span style='color: yellow;'>  &pound;" + formatCurrencyZeroDP(Math.round(final)) + "</span>@lang('mortgage.better off by switching')</b></span></p>";


            } else {

                var resultText = "@lang('mortgage.You will NOT save by switching')";
            }
        } else {
            var resultText = "<p>@lang('mortgage.Please insert values in every box')</p>";
        }
        document.getElementById("Rresults1").innerHTML = resultText;
        document.getElementById("resultbox").style.display = "block";
        document.getElementById("bestbuy_presearch").style.display = "none";
    }

    if (window.location.hash == '#switchloans') {

        viewinput2();

    }</script>
@endpush