@extends('layouts.app')
@push('style')
<style>

    .calc-container input[type="text"], .calc-container input[type="number"] {

        display: inline-block;
        height: 30px;
        line-height: 30px;
        border: 1px #d2d0d0 solid;
        border-radius: 2px;
        text-align: center;
        font-size: 20px;
        color: #565c65;
        padding-top: 0;
        padding-bottom: 0;
        padding-right: 0;
        background-color: #ffffff;
        line-height: 20px;
        box-shadow: 0 2px 11px -7px inset;
        box-sizing: border-box;
        margin-bottom: 2px;
    }

    .calc-content {
        box-shadow: 0 0 10px rgba(66, 86, 111, 1);
        background-color: rgba(66, 86, 111, 0.8);
        color: white;
        border-radius: 18px;
    }

    .calc-footer {
        font-size: 14px !important;
        background-color: whitesmoke;
    }

</style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="col-md-9">
            <div class="calc-container col-md-offset-3" style="max-width:600px;">
                <h1 class="calc-header">{{__('calc.Solution of quadratic equations')}}</h1>
                <div class="calc-content" style="font-size:20px;  font-family:'Times New Roman', Times, serif;">

                    <div style="text-align:center; padding:5px 0;">
                        <i>ax</i><sup>2</sup>&nbsp;+&nbsp;<i>bx</i>&nbsp;+&nbsp;<i>c</i>&nbsp;=&nbsp;0
                    </div>

                    <div style="display:table; margin:0 auto; font-size:16px;  font-family:'Times New Roman', Times, serif;">
                        <i>a</i>&nbsp;=&nbsp;<input type="text" id="val_a" value="4"
                                                    style="width:35px; text-align:left; padding-left:3px;"
                                                    onkeyup="change_equation()"> &nbsp;&nbsp;
                        <i>b</i>&nbsp;=&nbsp;<input type="text" id="val_b" value="-10"
                                                    style="width:35px; text-align:left; padding-left:3px;"
                                                    onkeyup="change_equation()"> &nbsp;&nbsp;
                        <i>c</i>&nbsp;=&nbsp;<input type="text" id="val_c" value="6"
                                                    style="width:35px; text-align:left; padding-left:3px;"
                                                    onkeyup="change_equation()">
                    </div>
                    <div style="display:table; margin:0 auto; padding-top:10px; font-size:20px;  font-family:'Times New Roman', Times, serif;">
                        <span id="equation"><i>2x</i><sup>2</sup>&nbsp;–&nbsp;<i>5x</i>&nbsp;+&nbsp;<i>3</i>&nbsp;=&nbsp;0</span>
                    </div>

                    <div style="text-align:center; padding:10px 0;"><span id="btn_calculate"
                                                                          class="calc-btn btn-calculate btn btn-success">{{__('calc.calculate')}}</span>
                    </div>
                </div><!--End calc-content-->
                <div class="calc-footer">

                    <div id="answer_equation" style="display: none;">
                        <div style="position:relative; top:0px;  font-size:14px; padding-left:45px; padding-bottom:10px;"><span
                                    style="color:#F00;">{{__('calc.answer')}}:</span></div>
                        <div class="text-center" data-hc-id="20746404046c0510c12855421a00">
                            <span id="answer_eq1" style="">@lang('calc.The discriminant is'):</span> <br>
                            <span id="answer_eq2"
                                  style="">D&nbsp;=&nbsp;b<sup>2</sup>&nbsp;–&nbsp;4ac&nbsp;=&nbsp;(-5)<sup>2</sup>&nbsp;–&nbsp;4·2·3&nbsp;=&nbsp;1</span>
                            <br>
                            <span id="answer_eq3" style="">@lang('calc.The discriminant D>')</span>
                            <br>
                            <div id="answer_eq4" style=" padding: 10px 0px 0px; display: flex;
    justify-content: center;">
                                <table cellspacing="0px" style="text-align-last:center; ">
                                    <tbody>
                                    <tr>
                                        <td rowspan="2"><span
                                                    style="display:inline-block; position:relative; top:0px;">x<sub>1</sub>&nbsp;=&nbsp;</span>
                                        </td>
                                        <td style="border-bottom:solid 1px;">-b + √<span
                                                    style="text-decoration:overline;">D</span></td>
                                        <td rowspan="2">&nbsp;=&nbsp;</td>
                                        <td style="border-bottom:solid 1px;">-<span id="answer_eq5">(-5)</span> + √<span
                                                    id="answer_eq6" style="text-decoration:overline;">1</span></td>
                                        <td rowspan="2">&nbsp;=&nbsp;<span id="answer_eq8">1.5</span></td>
                                    </tr>
                                    <tr>
                                        <td align="center">2a</td>
                                        <td align="center">2·<span id="answer_eq7">2</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="answer_eq17" style=" padding: 10px 0px 0px; display: block;">
                                <table cellspacing="0px" style="text-align-last:center;display: flex;
    justify-content: center;">
                                    <tbody>
                                    <tr>
                                        <td rowspan="2"><span
                                                    style="display:inline-block; position:relative; top:0px;">x<sub>2</sub>&nbsp;=&nbsp;</span>
                                        </td>
                                        <td style="border-bottom:solid 1px;">-b - √<span
                                                    style="text-decoration:overline;">D</span></td>
                                        <td rowspan="2">&nbsp;=&nbsp;</td>
                                        <td style="border-bottom:solid 1px;">-<span id="answer_eq9">(-5)</span> - √<span
                                                    id="answer_eq10" style="text-decoration:overline;">1</span></td>
                                        <td rowspan="2">&nbsp;=&nbsp;<span id="answer_eq12">1</span></td>
                                    </tr>
                                    <tr>
                                        <td align="center">2a</td>
                                        <td align="center">2·<span id="answer_eq11">2</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div id="answer_eq13" style=" padding:10px 0px 0px 0px; display:none;">
                                <table cellspacing="0px" style="text-align-last:center;
display: flex;
    justify-content: center;">
                                    <tbody>
                                    <tr>
                                        <td rowspan="2"><span style="display:inline-block; position:relative; top:0px;">x&nbsp;=&nbsp;</span>
                                        </td>
                                        <td align="center" style="border-bottom:solid 1px;">-b</td>
                                        <td rowspan="2">&nbsp;=&nbsp;</td>
                                        <td style="border-bottom:solid 1px;">-<span id="answer_eq14">b</span></td>
                                        <td rowspan="2">&nbsp;=&nbsp;<span id="answer_eq15"></span></td>
                                    </tr>
                                    <tr>
                                        <td align="center">2a</td>
                                        <td align="center">2·<span id="answer_eq16"> </span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            @lang('calc.Graphical solution of the quadratic')
                            <div id="grafSol"
                                 style="display: flex; justify-content: center; padding-top: 8px; overflow: auto;">


                                <div id="placeholder"
                                     style="width: 480px; height: 480px; overflow: auto; padding: 0px; position: relative;">
                                    <canvas class="flot-base"
                                            style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 480px; height: 480px;"
                                            width="480" height="480"></canvas>
                                    <div class="flot-text"
                                         style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                        <div class="flot-x-axis flot-x1-axis xAxis x1Axis"
                                             style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; max-width: 80px; top: 458px; left: 69px; text-align: center;">
                                                0.5
                                            </div>
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; max-width: 80px; top: 458px; left: 179px; text-align: center;">
                                                1.0
                                            </div>
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; max-width: 80px; top: 458px; left: 289px; text-align: center;">
                                                1.5
                                            </div>
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; max-width: 80px; top: 458px; left: 399px; text-align: center;">
                                                2.0
                                            </div>
                                        </div>
                                        <div class="flot-y-axis flot-y1-axis yAxis y1Axis"
                                             style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; top: 443px; left: 2px; text-align: right;">
                                                -0.20
                                            </div>
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; top: 388px; left: 2px; text-align: right;">
                                                -0.15
                                            </div>
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; top: 332px; left: 2px; text-align: right;">
                                                -0.10
                                            </div>
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; top: 277px; left: 2px; text-align: right;">
                                                -0.05
                                            </div>
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; top: 222px; left: 6px; text-align: right;">
                                                0.00
                                            </div>
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; top: 166px; left: 6px; text-align: right;">
                                                0.05
                                            </div>
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; top: 111px; left: 6px; text-align: right;">
                                                0.10
                                            </div>
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; top: 55px; left: 6px; text-align: right;">
                                                0.15
                                            </div>
                                            <div class="flot-tick-label tickLabel"
                                                 style="position: absolute; top: 0px; left: 6px; text-align: right;">
                                                0.20
                                            </div>
                                        </div>
                                    </div>
                                    <canvas class="flot-overlay"
                                            style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 480px; height: 480px;"
                                            width="480" height="480"></canvas>
                                    <div class="legend">
                                        <div style="position: absolute; width: 93px; height: 15px; top: 15px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"></div>
                                        <table style="position:absolute;top:15px;right:13px;;font-size:smaller;color:#545454">
                                            <tbody>
                                            <tr>
                                                <td class="legendColorBox">
                                                    <div style="border:1px solid #ccc;padding:1px">
                                                        <div style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden"></div>
                                                    </div>
                                                </td>
                                                <td class="legendLabel">f(x)=2x^2+-5x+3</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
<script src="{{asset('js/jquery.flot.js')}}"></script>
<script>

    jQuery(function ($) {


        var a = 0;
        var b = 0;
        var c = 0;
        var d = 0;
        var yF = "";
        var rr = 0;


        $('.btn-calculate').click(function () {
            calculate_equation();
        });

        function chartCreate() {




            // Add the Flot version string to the footer


            if (d > 0) {
                x_m = (x1 + x2) / 2;
            }
            x1_a = Math.abs(x1);
            x2_a = Math.abs(x2);
            if (x1_a < x2_a) {
                x_a = x2_a;
            }
            else {
                x_a = x1_a;
            }

            if (x1 < x2) {
                kx_max = x2 + x_a * 0.5;
                kx_max = kx_max.toFixed(1);
                kx_min = x1 - x_a * 0.5;
                kx_min = kx_min.toFixed(1);
                kx_min = Number(kx_min);
                kx_max = Number(kx_max);
            }
            else {
                kx_max = x1 + x_a * 0.5;
                kx_max = kx_max.toFixed(1);
                kx_min = x2 - x_a * 0.5;
                kx_min = kx_min.toFixed(1);
                kx_min = Number(kx_min);
                kx_max = Number(kx_max);
            }

            //alert(kx_min);
            //alert(kx_max);


            ky = a * x_m * x_m + b * x_m + c;
            ky = Math.abs(ky);
            ky = ky * 1.5;
            ky = ky.toFixed(1);


            var d1 = [];
            for (var i = kx_min; i < kx_max; i += 0.01) {
                d1.push([i, a * i * i + b * i + c]);
            }
            var d2 = [];
            d2.push([x1, a * x1 * x1 + b * x1 + c]);
            d2.push([x2, a * x2 * x2 + b * x2 + c]);

            $.plot("#placeholder", [
                    {
                        data: d1, label: "f(x)=" + a + "x^2+" + b + "x+" + c,
                        lines: {show: true},

                    }, {data: d2, points: {show: true}}
                ],
                {
                    crosshair: {
                        mode: "x"
                    },
                    grid: {
                        hoverable: true,
                        autoHighlight: false
                    },
                    yaxis: {
                        min: -ky,
                        max: ky
                    },
                    xaxis: {
                        min: kx_min,
                        max: kx_max
                    }
                });


        }

        function change_equation() {
            a = $("#val_a").val();
            b = $("#val_b").val();
            c = $("#val_c").val();
            n1 = "&nbsp;+&nbsp;";
            n2 = "&nbsp;+&nbsp;";
            m1 = "<i>" + a + "x</i><sup>2</sup>";
            m2 = "<i>" + b + "x</i>";
            m3 = "<i>" + c + "</i>";
            u1 = "+";
            u2 = "+";
            g1 = a + "x^2";
            g2 = b + "x";
            g3 = c;

            if (b == 0) {
                n1 = "";
                m2 = "";
                u1 = "";
                g2 = "";
            }
            if (c == 0) {
                n2 = "";
                u2 = "";
                m3 = "";
                g3 = "";
            }
            if (a == 1 || a == -1) {
                m1 = "x<sup>2</sup>";
                g1 = "x^2";
            }
            if (b == 1 || b == -1) {
                m2 = "x";
                g2 = "x";
            }
            if (b < 0) {
                n1 = "&nbsp;&ndash;&nbsp;";
                u1 = "-";
                b1 = parseFloat(b) * -1;
                m2 = "<i>" + b1 + "x</i>";
                g2 = b + "x";
            }
            if (c < 0) {
                n2 = "&nbsp;&ndash;&nbsp;";
                u2 = "-";
                c1 = parseFloat(c) * -1;
                m3 = "<i>" + c1 + "</i>";
                g3 = c1;
            }

            if (a != 0) {
                eq = m1 + n1 + m2 + n2 + m3 + "&nbsp;=&nbsp;0";
                yF = "y(x)=" + g1 + u1 + g2 + u2 + g3;
                $("#equation").html(eq);

            }
            else {
                alert('Коэффициент "a" не должен быть равен "0"!');
            }
        }

        function calculate_equation() {
            $("#answer_eq4").css("display", "none");
            $("#answer_eq17").css("display", "none");
            $("#answer_eq13").css("display", "none");
            $("#grafSol").css("display", "none");
            a = $("#val_a").val();
            b = $("#val_b").val();
            c = $("#val_c").val();
            a = parseFloat(a);
            b = parseFloat(b);
            c = parseFloat(c);
            a1 = a;
            b1 = b;
            c1 = c;
            if (a < 0) a1 = "(" + a + ")";
            if (b < 0) b1 = "(" + b + ")";
            if (c < 0) c1 = "(" + c + ")";
            $("#answer_equation").css("display", "block");
            d = b * b - 4 * a * c;
            $("#answer_eq1").html("@lang('calc.The discriminant is'):");
            ss = "D&nbsp;=&nbsp;b<sup>2</sup>&nbsp;&ndash;&nbsp;4ac&nbsp;=&nbsp;" + b1 + "<sup>2</sup>&nbsp;&ndash;&nbsp;4&#183;" + a1 + "&#183;" + c1 + "&nbsp;=&nbsp;" + d;
            $("#answer_eq2").html(ss);
            if (d > 0) {
                $("#answer_eq4").css("display", "flex");
                $("#answer_eq17").css("display", "block");
                $("#answer_eq3").html("@lang('calc.The discriminant D>')");
                $("#answer_eq5").html(b1);
                $("#answer_eq6").html(d);
                $("#answer_eq7").html(a1);
                x1 = (-b + Math.sqrt(d)) / (2 * a);
                $("#answer_eq8").html(x1);
                $("#answer_eq9").html(b1);
                $("#answer_eq10").html(d);
                $("#answer_eq11").html(a1);
                x2 = (-b - Math.sqrt(d)) / (2 * a);
                $("#answer_eq12").html(x2);

                $("#grafSol").css("display", "flex");
                chartCreate();
            }
            if (d == 0) {
                $("#answer_eq3").html("@lang('calc.The discriminant D =')");
                $("#answer_eq13").css("display", "block");
                $("#answer_eq14").html(b1)
                $("#answer_eq16").html(a1);
                x1 = (-b) / (2 * a);
                $("#answer_eq15").html(x1);

            }
            if (d < 0) {
                $("#answer_eq3").html("@lang('calc.The discriminant D <')");
            }
        }

        change_equation();
    });


</script>
@include('template.mathjs')
@endpush