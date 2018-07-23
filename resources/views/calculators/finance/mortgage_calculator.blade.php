@extends('layouts.app')
@push('style')

<link rel="stylesheet" href="/public/bower_components/morris.js/morris.css">
<style>
    .loader {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .result{
        margin-top: 20px;
    }
    .result li{
        list-style: none;
        font-size: 15px;
        margin-bottom: 5px;
    }
    .nav-tabs li a {
        color: white;
        margin-right: 0 !important;
    }

    .nav-tabs li a:hover {
        background-color: #ff400b;
        border-color: transparent !important;

    }

    .nav-tabs li {
        background-color: #FF4F00;
        color: white;
        margin-top: 15px;
        margin-bottom: 15px;
        border-radius: 5px;
        margin-left: 4px;
    }

    .table-shadule {
        background-color: white;
        height: 400px;
        margin-top: 15px;
        overflow-y: scroll;
        margin-bottom: 30px
    }
    .form-group {
        margin-bottom: 5px;
    }
    #mortgage input{
        width: 150px;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="col-xs-12 col-md-9 ">
            <div class="col-md-12 calc-header">{{$page->name}}</div>
            <div class="col-md-6 calc-form">
                <form id="mortgage" action="finance/mortgage" class="col-md-4" method="post" style="margin-top: 15px">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="amount">@lang('mortgage.principal')</label>
                            <input value="150000" type="number" class="form-controll" id="amount" name="amount"></div>
                    <div class="form-group">
                        <label for="term">@lang('mortgage.term_years')</label>
                            <input value="30" type="number" class="form-controll" id="term" name="term"></div>
                    <div class="form-group">
                        <label for="rate">@lang('mortgage.rate') %</label>
                            <input value="6.5" placeholder="%" type="number" class="form-controll" id="rate" name="rate">
                    </div>
                    <div class="form-group">
                        <label for="date_init">@lang('mortgage.start_date')</label>
                            <input type="date" value="{{date('Y-m-d')}}" id="date_init" class="form-controll" name="date_init">
                    </div>
                    <div class="form-group">
                        <span id="calculate" type="button" class="btn btn-success">@lang('calc.answer')</span>
                    </div>
                </form>
                <div class="col-md-8">
                    <ul class="result" >
                        <li class="">@lang('mortgage.monthlyPayment'):    <span style="font-size:18px" id="monthly_paymant"></span></li>
                        <li class="">@lang('mortgage.totalInterest'):     <span style="font-size:18px;" id="total_interest"></span> </li>
                        <li class="">@lang('mortgage.totalLoanPayment'): <span style="font-size:18px;" id="total_loan_payment"></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 ">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom">

                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart"
                             style="position: relative; height: 300px;background-color: white">
                        </div>
                    </div>
                </div>
                <!-- /.nav-tabs-custom -->

            </div>
            <div class="col-md-12 calc-form" style="margin-top: 50px">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#menu1">@lang('mortgage.yearly')</a></li>
                    <li><a data-toggle="tab" href="#menu2">@lang('mortgage.monthly')</a></li>
                   <h3 style="text-align: center">@lang('mortgage.amortization Schedule')</h3>
                </ul>

                <div class="tab-content ">

                    <div id="menu1" class="tab-pane fade in active">
                        <div class="col-md-10 col-md-offset-1 table-shadule">
                            <table class="table table-bordered" style="margin-top: 20px; color: black">
                                <thead>
                                <tr>
                                    <th>@lang('mortgage.date')</th>
                                    <th>@lang('mortgage.start_balance')</th>
                                    <th>@lang('mortgage.interest')</th>
                                    <th>@lang('mortgage.principal')</th>
                                    <th>@lang('mortgage.ending balance')</th>
                                </tr>
                                </thead>
                                <tbody id="year_shad">
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="col-md-10 col-md-offset-1 table-shadule">

                        <table class="table table-bordered" style="margin-top: 20px; color: black">
                            <thead>
                            <tr>
                                <th>@lang('mortgage.date')</th>
                                <th>@lang('mortgage.start_balance')</th>
                                <th>@lang('mortgage.interest')</th>
                                <th>@lang('mortgage.principal')</th>
                                <th>@lang('mortgage.ending balance')</th>
                            </tr>
                            </thead>
                            <tbody id="mounth_shad">

                            </tbody>
                        </table></div>
                    </div>
                </div>
            </div>
            @include('template.show_theory')
        </div>
        @include('baners.right_banner')

    </div>
@endsection

@push('script')
<script src="/public/bower_components/morris.js/morris.min.js"></script>
<script src="/public/bower_components/raphael/raphael.min.js"></script>
<script>
    $(document).ready(function () {
        initCalc();

        function chart(data1) {
            $('#revenue-chart').html('');
            var area = new Morris.Line({
                element: 'revenue-chart',
                resize: true,
                data: data1,
                xkey: 'date',
                ykeys: ['ending_balance', 'interest', 'principal'],
                labels: ['@lang('other.end date')', '@lang('mortgage.interest')', '@lang('mortgage.principal')'],
                lineColors: ['#a0d0e0', '#3c8dbc', 'pink'],
                hideHover: ''
            });

        }

//    chart(data1)
        function initCalc() {
            let form_input = $('#mortgage').serialize();
            $('#revenue-chart').html(`
<div class="col-md-12" style="margin-top: 80px;display: flex;justify-content: center">
<div class="loader"></div>
</div>
`);

            $.ajax({
                url: '/finance/mortgage',
                method: 'post',
                data: form_input,
                success: function (data) {
                    $('#monthly_paymant').html(data.monthly_paymant.toLocaleString());
                    $('#total_interest').html(data.total_interest.toLocaleString());
                    $('#total_loan_payment').html(data.total_loan_payment.toLocaleString());
                    chart(Object.values(data.yearly));
                    createYearShadule(data.yearly);
                    createMontlyShadule(data.monthly)
                }
            });
        }
        function createYearShadule(data) {
            let table='';
            for(let item in data){
                table+=` <tr>
                                    <td>${data[item].date}</td>
                                    <td>${data[item].starting_balance}</td>
                                    <td>${data[item].interest}</td>
                                    <td>${data[item].principal}</td>
                                    <td>${data[item].ending_balance}</td>
                       </tr>`;
            }
            $('#year_shad').html(table);

        }
        function createMontlyShadule(data) {
            let table='';
            for(let item in data){
                table+=` <tr>
                                    <td>${data[item].date}</td>
                                    <td>${data[item].starting_balance}</td>
                                    <td>${data[item].interest}</td>
                                    <td>${data[item].principal}</td>
                                    <td>${data[item].ending_balance}</td>
                       </tr>`;
            }
            $('#mounth_shad').html(table);

        }

        $('#calculate').click(function () {
            initCalc();
        });
    });
</script>
@endpush