@extends('layouts.app')
@push('style')
<style>
    .calc-form{
        padding:20px;

    }
    .nav-tabs>li>a{
        background-color: whitesmoke;
    }
    form .col-md-7{
        margin-bottom: 10px;
    }
    label{
        display: block;
        margin-bottom: 0;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid ">
        <div class="col-xs-12 col-md-9">
            <div class="col-md-12 calc-header"><h2>Car Payment</h2></div>

            <div class="col-md-8 col-md-offset-1 calc-form">



                    <div id="home" class="tab-pane fade in active">
                        <form id="wacc-form" class="">
                            <div class="row">
                                <div class="form-group ">
                                    <label for="re" class="col-xs-12 col-md-5">@lang('mortgage.Cost of equity') (rE)</label>
                                    <div class="col-md-7">
                                    <input type="number" class="form-control percent-input success" name="re" id="re" placeholder="%">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="e" class="col-xs-12 col-md-5">@lang('mortgage.Total equity') (E)</label>
                                    <div class="col-md-7">
                                    <input type="number" class="form-control u-input" name="e" id="e" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="rd" class="col-xs-12 col-md-5">@lang('mortgage.Cost of debt') (rD)</label>
                                    <div class="col-md-7">
                                    <input type="number" class="form-control percent-input" name="rd" id="rd" placeholder="%">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="d" class="col-xs-12 col-md-5">@lang('mortgage.Total debt') (D)</label>
                                    <div class="col-md-7">
                                    <input type="number" class="form-control u-input" name="d" id="d" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="t" class="col-xs-12 col-md-5">@lang('mortgage.Corporate tax rate') (t)</label>
                                    <div class="col-md-7">
                                    <input type="number" class="form-control percent-input" name="t" id="t" placeholder="%">
                                    </div>
                                </div>


                            </div>
                            <div class="form-group  btn">
                                <input type="submit" class="btn btn-block" id="calculate" value="calculate">
                            </div>

                        </form>
                    </div>


            </div>
            <div id="result" class="col-xs-12 col-md-8 col-md-offset-1 calc-form "
                 style="margin-top: 15px;visibility:hidden">
            </div>
            @include('template.show_theory')
        </div>
        @include('baners.right_banner')
    </div>



@endsection
@push('script')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
@include('template.mathjs')

<script>
    $('#wacc-form').validate({
        rules: {
            re:{
                required:true,

            },
            e:{
                required:true
            },
            rd:{
                required:true
            },
            d:{
                required:true
            },
            t:{
                required:true
            }
        },
        messages: {
            required: '@lang('validation.required')'

        },


        highlight: function (element) {
            $(element).closest('input').removeClass('success').addClass('error');

        },
        submitHandler: function(form) {

            $('#result').css('visibility', 'visible');

            let e = parseFloat(form.e.value),
                d = parseFloat(form.d.value),
                re = parseFloat(form.re.value)*0.01,
                rd = parseFloat(form.rd.value)*0.01,
                t = parseFloat(form.t.value)*0.01;
            let wacc = Math.round(((e/(d+e)*re)+(d/(d+e)*rd)*(1-t))*100*100)/100;
            let html = `@lang('mortgage.Weighted Average Cost of Capital') (WACC):  \\({\\space${wacc}}%\\)<hr>
            $$ WACC =\\frac{E}{D+E}\\times r_{E}+\\frac{D}{D+E}\\times r_{D}\\times (1-t)=\\\\
               \\frac{${e}}{${d}}+${e}\\times ${re}+\\frac{${d}}{${d}+${e}}\\times ${rd}\\times (1-${t}) =\\\\
                {${wacc}}%
                $$`;
            $('#result').html(html);
            MathJax.Hub.Queue(['Typeset',MathJax.Hub])
            $('html, body').animate({
                scrollTop: $("#result").offset().top
            }, 2000);
        },
        success: function (element) {

        }
    });

</script>

@endpush