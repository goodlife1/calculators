@extends('layouts.app')
@push('style')
<style>


    .btn-calculate {
        margin-top: 10px;
    }

    a:hover {
        color: white;
        text-decoration: none;
    }

    .calc-container > a {
        text-align: right;
        min-height: 200px;

    }

    .btn-calculate {
        margin-top: 10px;
        text-decoration: none;
        color: white;
        border-radius: 3px;
        background-color: #FF4F00;
        padding: 5px;
        cursor: pointer;
    }

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

    select, textarea, input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .inputbox {
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555555;
        background-color: #ffffff;
        background-images: none;
        border: 1px solid #cccccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }

    .theory {
        border: 2px solid whitesmoke;
    }

</style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="col-md-9 wrapper">
            <div class="row text-center">
                {{--<p>--}}
                {{--<span style="color: #ffd14d;">Площадь</span> — численная характеристика двумерной (плоской или--}}
                {{--искривлённой) геометрической фигуры.--}}
                {{--</p>--}}
            </div>
            <div style="">
                <div class="clearfix">
                    <div class=" col-md-6 calc-container calc_area calc_area_left">
                        <div class="calc-header" data-hc-id="1d70c5fa92fc5052fa5c067a6348">
                            {{__('calc.rectangle')}}
                        </div>
                        <div class="calc-content">
                            <table>
                                <tbody>
                                <tr>
                                    <td class="" height="36" style="width:60%;">
                                        a=<input type="text" size="6" id="val_rect1" class="calc-input" value="">
                                        <select id="rec_par1">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">                                            @lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>
                                    <td rowspan="4" style="width:40%;">
                                        <img class="calc-area-img" src="/images/math/area_rectangle.png"
                                             alt="Расчет площади прямоугольника (рисунок)ы">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        b=<input type="text" size="6" id="val_rect2" class="calc-input" value="">
                                        <select id="rec_par2">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">                                            @lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a id="btn_calculate_rect" class="calc-btn btn-calculate">{{__('calc.calculate')}}</a>
                        </div>


                        <div class="calc-footer">
                            <div id="div_answer" style="margin:0 auto; position:relative; left: 20px; display:none;">
                                <div style="position:relative; top:0px; color:#F00; font-size:14px; padding-left:0px;">
                                    {{__('calc.answer')}}:
                                </div>
                                <div>S=<span id="a_rect" class="answer_s"> 1111 </span>
                                    <select id="rec_par3">
                                        <option value="" selected="selected"></option>
                                        <option value="mm">@lang('value.sq') .мм</option>
                                        <option value="cm">@lang('value.sq') .см</option>
                                        <option value="m">@lang('value.sq') .м</option>
                                        <option value="km">@lang('value.sq') .км</option>
                                        <option value="f">@lang('value.sq') . @lang('value.feet') </option>
                                        <option value="ya">@lang('value.sq') .@lang('value.yards') </option>
                                        <option value="d">@lang('value.sq') .@lang('value.inches') </option>
                                        <option value="ml">@lang('value.sq') .@lang('value.miles') </option>
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 calc-container calc_area">
                        <div class="calc-header" data-hc-id="5f54edfe98fc147bb91d963831d8">
                            {{__('calc.triangle')}}
                        </div>
                        <div class="calc-content">
                            <div style="padding-left:5px;">
                                <span>{{__('calc.method for finding the area of a triangle')}}</span>
                                <select id="tri_var" class="" style="width:100%;">
                                    <option value="var1" selected="selected">{{__('calc.on three sides')}}</option>
                                    <option value="var2">{{__('calc.on one side and the height lowered to this side')}}</option>
                                    <option value="var3">{{__('calc.on two sides and the corner between them')}}</option>
                                </select>

                            </div>
                            <table>
                                <tbody>

                                <tr>
                                    <td style="width:60%;" class="">
                                        <span id="tri_name1">a=</span><input type="text" size="6" id="tri_val1"
                                                                             class="calc-input" value="">
                                        <select id="tri_units1">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">                                            @lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>

                                    <td rowspan="4" style="width:40%;">
                                        <img class="calc-area-img" id="tri_pic" src="/images/math/area_triangle1.png"
                                             alt="Расчет площади треугольника (рисунок)">

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span id="tri_name2">b=</span><input type="text" size="6" id="tri_val2"
                                                                             class="calc-input" value="">
                                        <select id="tri_units2">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">                                            @lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="div_tri1" style="float:left;display: block;
     width:14px; padding-top:4px;"><span
                                                    id="tri_name3">c=</span></div>
                                        <div id="div_tri2" style="float:left; display:block;"><input type="text"
                                                                                                     size="6"
                                                                                                     id="tri_val3"
                                                                                                     class="calc-input"
                                                                                                     value=""></div>
                                        <div id="div_tri3" style="float:left; display:block; margin-left:3px;">
                                            <select id="tri_units3" class="">
                                                <option value="" selected="selected"></option>
                                                <option value="mm" selected="selected">мм</option>
                                                <option value="cm">см</option>
                                                <option value="m">м</option>
                                                <option value="km">км</option>
                                                <option value="f">                                            @lang('value.feet') </option>
                                                <option value="ya">@lang('value.yards') </option>
                                                <option value="d">@lang('value.inches') </option>
                                                <option value="ml">@lang('value.miles') </option>
                                            </select>
                                        </div>
                                        <div id="div_tri4" style="float:left; display:none; margin-left:5px;">
                                            <select id="tri_units4" style="width:61px;">
                                                <option value="deg" selected="selected">град.</option>
                                                <option value="rad">рад.</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a id="btn_calculate_triangle" class="calc-btn btn-calculate">{{__('calc.calculate')}}</a>
                        </div>


                        <div class="calc-footer">

                            <div id="div_answer_tri"
                                 style="margin:0 auto; position:relative; left: 20px; display:none;">
                                <div style="position:relative; top:0px; color:#F00; font-size:14px; padding-left:0px;">
                                    {{__('calc.answer')}}:
                                </div>
                                <div>S=<span id="a_tri" class="answer_s"> 1111 </span>
                                    <select id="tri_units5">
                                        <option value="" selected="selected"></option>
                                        <option value="mm">@lang('value.sq') .мм</option>
                                        <option value="cm">@lang('value.sq') .см</option>
                                        <option value="m">@lang('value.sq') .м</option>
                                        <option value="km">@lang('value.sq') .км</option>
                                        <option value="f">@lang('value.sq') . @lang('value.feet') </option>
                                        <option value="ya">@lang('value.sq') .@lang('value.yards') </option>
                                        <option value="d">@lang('value.sq') .@lang('value.inches') </option>
                                        <option value="ml">@lang('value.sq') .@lang('value.miles') </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <hr>

                <div class="clearfix">
                    <div class="col-md-6 calc-container calc_area calc_area_left">
                        <div class="calc-header"><span>{{__('calc.parallelogram')}}</span></div>
                        <div class="calc-content">
                            <div style="padding-left:5px;">
                                <span>{{__('calc.method for finding the area of a parallelogram')}}</span><br>
                                <select id="par_var" style="width:100%;">
                                    <option value="var1"
                                            selected="selected">{{__('calc.On the base and height of the parallelogram')}}
                                    </option>
                                    <option value="var2">{{__('calc.on two sides and the corner between them')}}</option>
                                    <option value="var3">{{__('calc.On two diagonals and the angle between them')}}</option>
                                </select>

                            </div>
                            <table style=" ">
                                <tbody>

                                <tr>
                                    <td style="width:60%;">
                                        <span id="par_name1">a=</span><input type="text" size="6" id="par_val1"
                                                                             class="calc-input" value="">
                                        <select id="par_units1">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">                                            @lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>

                                    <td rowspan="4" style="width:60%;">
                                        <img class="calc-area-img" id="par_pic"
                                             src="/images/math/area_parallelogram1.png"
                                             alt="Расчет площади параллелограмма (рисунок)">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span id="par_name2">h=</span><input type="text" size="6" id="par_val2"
                                                                             class="calc-input" value="">
                                        <select id="par_units2" class="">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">                                            @lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="div_par1"
                                             style="float:left; width:14px; padding-top:4px; display:none;"><span
                                                    id="par_name3">c=</span></div>
                                        <div id="div_par2" style="float:left; display:none;"><input type="text" size="6"
                                                                                                    id="par_val3"
                                                                                                    class="calc-input"
                                                                                                    value=""></div>
                                        <div id="div_par3" style="float:left; display:none; margin-left:3px;">
                                            <select id="par_units3">

                                                <option value="mm" selected="selected">мм</option>
                                                <option value="cm">см</option>
                                                <option value="m">м</option>
                                                <option value="km">км</option>
                                                <option value="f">                                            @lang('value.feet') </option>
                                                <option value="ya">@lang('value.yards') </option>
                                                <option value="d">@lang('value.inches') </option>
                                                <option value="ml">@lang('value.miles') </option>
                                            </select>
                                        </div>
                                        <div id="div_par4" style="float:left; display:none; margin-left:5px;">
                                            <select id="par_units4" class="" style="width:71px;">
                                                <option value="deg" selected="selected">град.</option>
                                                <option value="rad">рад.</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a id="btn_calculate_parallelogram"
                               class="calc-btn btn-calculate">{{__('calc.calculate')}}</a>
                        </div>

                        <div class="calc-footer">

                            <div id="div_answer_par"
                                 style="margin:0 auto; position:relative; left: 20px;  display:none;">
                                <div style="position:relative; top:0px; color:#F00; font-size:14px; padding-left:0px;">
                                    {{__('calc.answer')}}:
                                </div>
                                <div>S=<span id="a_par" class="answer_s"> 1111 </span>
                                    <select id="par_units5">
                                        <option value="" selected="selected"></option>
                                        <option value="mm">@lang('value.sq') .мм</option>
                                        <option value="cm">@lang('value.sq') .см</option>
                                        <option value="m">@lang('value.sq') .м</option>
                                        <option value="km">@lang('value.sq') .км</option>
                                        <option value="f">@lang('value.sq') . @lang('value.feet') </option>
                                        <option value="ya">@lang('value.sq') .@lang('value.yards') </option>
                                        <option value="d">@lang('value.sq') .@lang('value.inches') </option>
                                        <option value="ml">@lang('value.sq') .@lang('value.miles') </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 calc-container calc_area">
                        <div class="calc-header"
                             data-hc-id="11508421182000413801022022a0">{{__('calc.a regular polygon')}}
                        </div>
                        <div class="calc-content">
                            <div style="padding-left:5px;">
                                <select id="pol_var" class="" style="width:100%;">
                                    <option value="var1"
                                            selected="selected">{{__('calc.Polygon with number of sides n and length parties a')}}
                                    </option>
                                    <option value="var2">{{__('calc.A polygon with a number of sides n inscribed in a circle of radius')}}
                                        R
                                    </option>
                                    <option value="var3">{{__('calc.A polygon with described around a circle of radius')}}
                                        r
                                    </option>
                                </select>

                            </div>

                            <table style=" ">
                                <tbody>
                                <tr>
                                    <td width="150" style="width:60%;">

                                        <span id="pol_name1"> n=</span>
                                        <select id="pol_units1" style="vertical-align: middle;">

                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6" selected="selected">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                    </td>

                                    <td rowspan="3" style="width:40%;">
                                        <img class="calc-area-img" id="pol_pic" src="/images/math/area_polygon1.png"
                                             alt="Расчет площади многоугольника (рисунок)">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="width:16px; float:left; padding-top:4px;"><span
                                                    id="pol_name2">a=</span></div>
                                        <input type="text" size="6" id="pol_val2" class="calc-input" value="">
                                        <select id="pol_units2" class="">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">                                            @lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <a id="btn_calculate_polygon" class="calc-btn btn-calculate"
                               style="margin-left:20px; margin-top:-6px; ">{{__('calc.calculate')}}</a>
                        </div>

                        <div class="calc-footer">

                            <div id="div_answer_pol"
                                 style="margin:0 auto; position:relative; left: 20px; display:none;">
                                <div style="position:relative; top:0px; color:#F00; font-size:14px; padding-left:0px;">
                                    {{__('calc.answer')}}:
                                </div>
                                <div>S=<span id="a_pol" class="answer_s"> 1111 </span>
                                    <select id="pol_units5">
                                        <option value="" selected="selected"></option>
                                        <option value="mm">@lang('value.sq') .мм</option>
                                        <option value="cm">@lang('value.sq') .см</option>
                                        <option value="m">@lang('value.sq') .м</option>
                                        <option value="km">@lang('value.sq') .км</option>
                                        <option value="f">@lang('value.sq') . @lang('value.feet') </option>
                                        <option value="ya">@lang('value.sq') .@lang('value.yards') </option>
                                        <option value="d">@lang('value.sq') .@lang('value.inches') </option>
                                        <option value="ml">@lang('value.sq') .@lang('value.miles') </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="clearfix">
                    <div class="col-md-6 calc-container calc_area calc_area_left">
                        <div class="calc-header"><span>{{__('calc.circle')}}</span></div>
                        <div class="calc-content">
                            <div style="padding-left:5px;" data-hc-id="5cdc4586e9303975f136c7d852d0">
                                {{__('calc.area of the circle')}}
                                <form action="">
                                    <label><input type="radio" name="r-d" value="r"
                                                  checked="checked">{{__('calc.radius of a circle')}} –
                                        <i>r</i></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label><input type="radio" name="r-d" value="d"> {{__('calc.circle diameter')}} –
                                        <i>d</i></label>
                                </form>
                            </div>
                            <table>
                                <tbody>

                                <tr>
                                    <td style="width:60%;">
                                        <span id="cir_name1">r=</span><input type="text" size="6" id="cir_val1"
                                                                             class="calc-input" value="">
                                        <select id="cir_units1">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">@lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>

                                    <td rowspan="2" style="width:40%;">
                                        <img class="calc-area-img" id="cir_pic" src="/images/math/area_circle1.png"
                                             alt="Расчет площади круга (рисунок)">
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                            <a id="btn_calculate_circle" class="calc-btn btn-calculate">{{__('calc.calculate')}}</a>
                        </div>

                        <div class="calc-footer">

                            <div id="div_answer_cir"
                                 style="margin:0 auto; position:relative; left: 20px; display:none;">
                                <div style="position:relative; top:0px; color:#F00; font-size:14px; padding-left:0px;">
                                    {{__('calc.answer')}}:
                                </div>
                                <div>S=<span id="a_cir" class="answer_s"> 1111 </span>
                                    <select id="cir_units5">
                                        <option value="" selected="selected"></option>
                                        <option value="mm">@lang('value.sq') .мм</option>
                                        <option value="cm">@lang('value.sq') .см</option>
                                        <option value="m">@lang('value.sq') .м</option>
                                        <option value="km">@lang('value.sq') .км</option>
                                        <option value="f">@lang('value.sq') . @lang('value.feet') </option>
                                        <option value="ya">@lang('value.sq') .@lang('value.yards') </option>
                                        <option value="d">@lang('value.sq') .@lang('value.inches') </option>
                                        <option value="ml">@lang('value.sq') .@lang('value.miles') </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 calc-container calc_area">
                        <div class="calc-header"><span>@lang('calc.ellipse')</span></div>
                        <div class="calc-content">

                            <table style=" ">
                                <tbody>

                                <tr>
                                    <td style="width:60%;">
                                        <span id="ell_name1">a=</span><input type="text" size="6" id="ell_val1"
                                                                             class="calc-input" value="">
                                        <select id="ell_units1" class="">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">                                            @lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>

                                    <td rowspan="4" style="bwidth:40%;">
                                        <img class="calc-area-img" id="ell_pic" src="/images/math/area_ellipse.png"
                                             alt="Расчет площади эллипса (рисунок)">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span id="ell_name2">b=</span><input type="text" size="6" id="ell_val2"
                                                                             class="calc-input" value="">
                                        <select id="ell_units2" class="">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">                                            @lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <a id="btn_calculate_ellipse" class="calc-btn btn-calculate">{{__('calc.calculate')}}</a>
                        </div>

                        <div class="calc-footer">

                            <div id="div_answer_ell"
                                 style="margin:0 auto; position:relative; left: 20px; display:none;">
                                <div style="position:relative; top:0px; color:#F00; font-size:14px; padding-left:0px;">
                                    {{__('calc.answer')}}:
                                </div>
                                <div>S=<span id="a_ell" class="answer_s"> 1111 </span>
                                    <select id="ell_units5">
                                        <option value="" selected="selected"></option>
                                        <option value="mm">@lang('value.sq') .мм</option>
                                        <option value="cm">@lang('value.sq') .см</option>
                                        <option value="m">@lang('value.sq') .м</option>
                                        <option value="km">@lang('value.sq') .км</option>
                                        <option value="f">@lang('value.sq') . @lang('value.feet') </option>
                                        <option value="ya">@lang('value.sq') .@lang('value.yards') </option>
                                        <option value="d">@lang('value.sq') .@lang('value.inches') </option>
                                        <option value="ml">@lang('value.sq') .@lang('value.miles') </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="clearfix">
                    <div class="col-md-6 calc-container calc_area calc_area_left">
                        <div class="calc-header"><span>{{__('calc.sector')}}</span></div>
                        <div class="calc-content">
                            <div style="padding-left:5px;" data-hc-id="5c184080e1201154d016c5d00280">

                                {{__('calc.area of the circle sector')}}
                                <form action="">
                                    <label><input type="radio" name="a-l" value="a"
                                                  checked="checked"> {{__('calc.sector angle')}} –
                                        <i>θ</i></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label><input type="radio" name="a-l" value="l"> {{__('calc.arc length')}} –
                                        <i>L</i></label>
                                </form>
                            </div>
                            <table>
                                <tbody>

                                <tr>
                                    <td style="width:60%;">
                                        <div style="float:left; width:14px; padding-top:4px; "><span
                                                    id="sec_name1">r=</span></div>
                                        <div style="float:left;"><input type="text" size="6" id="sec_val1"
                                                                        class="calc-input" value=""></div>
                                        <div style="float:left;  margin-left:3px;">
                                            <select id="sec_units1">
                                                <option value="mm" selected="selected">мм</option>
                                                <option value="cm">см</option>
                                                <option value="m">м</option>
                                                <option value="km">км</option>
                                                <option value="f">                                            @lang('value.feet') </option>
                                                <option value="ya">@lang('value.yards') </option>
                                                <option value="d">@lang('value.inches') </option>
                                                <option value="ml">@lang('value.miles') </option>
                                            </select>
                                        </div>
                                    </td>

                                    <td rowspan="3" style="width:40%;">
                                        <img class="calc-area-img" id="sec_pic" src="/images/math/area_sector1.png"
                                             alt="Расчет площади сектора круга (рисунок)">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="div_sec"
                                             style="float:left; width:14px; padding-top:4px; display:block;"><span
                                                    id="sec_name3">θ=</span></div>
                                        <div id="div_sec2" style="float:left; display:block;"><input type="text"
                                                                                                     size="6"
                                                                                                     id="sec_val3"
                                                                                                     class="calc-input"
                                                                                                     value=""></div>
                                        <div id="div_sec3" style="float:left; display:none; margin-left:3px;">
                                            <select id="sec_units3" class="">

                                                <option value="mm" selected="selected">мм</option>
                                                <option value="cm">см</option>
                                                <option value="m">м</option>
                                                <option value="km">км</option>
                                                <option value="f">                                            @lang('value.feet') </option>
                                                <option value="ya">@lang('value.yards') </option>
                                                <option value="d">@lang('value.inches') </option>
                                                <option value="ml">@lang('value.miles') </option>
                                            </select>
                                        </div>
                                        <div id="div_sec4" style="float:left; display:block; margin-left:5px;">
                                            <select id="sec_units4" style="width:71px;">
                                                <option value="deg" selected="selected">град.</option>
                                                <option value="rad">рад.</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <a id="btn_calculate_sector" class="calc-btn btn-calculate">{{__('calc.calculate')}}</a>
                        </div>


                        <div class="calc-footer">
                            <div id="div_answer_sec"
                                 style="margin:0 auto; position:relative; left: 20px; display:none;">
                                <div style="position:relative; top:0px; color:#F00; font-size:14px; padding-left:0px;">
                                    {{__('calc.answer')}}:
                                </div>
                                <div>S=<span id="a_sec" class="answer_s"> 1111 </span>
                                    <select id="sec_units5">
                                        <option value="" selected="selected"></option>
                                        <option value="mm">@lang('value.sq') .мм</option>
                                        <option value="cm">@lang('value.sq') .см</option>
                                        <option value="m">@lang('value.sq') .м</option>
                                        <option value="km">@lang('value.sq') .км</option>
                                        <option value="f">@lang('value.sq') . @lang('value.feet') </option>
                                        <option value="ya">@lang('value.sq') .@lang('value.yards') </option>
                                        <option value="d">@lang('value.sq') .@lang('value.inches') </option>
                                        <option value="ml">@lang('value.sq') .@lang('value.miles') </option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 calc-container calc_area">
                        <div class="calc-header"><span>{{__('calc.trapeze')}}</span></div>
                        <div class="calc-content">
                            <div style="padding-left:5px;"><span>{{__('calc.area of a trapezoid')}}</span>
                                <select id="trap_var" style="width:100%;">
                                    <option value="var1"
                                            selected="selected">{{__('calc.For two reasons a b and height h')}}</option>
                                    <option value="var2">{{__('calc.On two bases a b')}}</option>

                                </select>

                            </div>
                            <table style=" ">
                                <tbody>

                                <tr>
                                    <td style="width:60%;">
                                        <span id="trap_name1">a=</span><input type="text" size="6" id="trap_val1"
                                                                              class="calc-input" value="">
                                        <select id="trap_units1">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">                                            @lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>

                                    <td rowspan="3" style="width:40%;">
                                        <img class="calc-area-img" id="trap_pic" src="/images/math/area_trapeze1.png"
                                             alt="Расчет площади сектора трапеции (рисунок)">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span id="trap_name2">b=</span><input type="text" size="6" id="trap_val2"
                                                                              class="calc-input" value="">
                                        <select id="trap_units2">

                                            <option value="mm" selected="selected">мм</option>
                                            <option value="cm">см</option>
                                            <option value="m">м</option>
                                            <option value="km">км</option>
                                            <option value="f">                                            @lang('value.feet') </option>
                                            <option value="ya">@lang('value.yards') </option>
                                            <option value="d">@lang('value.inches') </option>
                                            <option value="ml">@lang('value.miles') </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="div_trap1" style="float:left; width:14px; padding-top:4px;"><span
                                                    id="trap_name3">h=</span></div>
                                        <div id="div_trap2" style="float:left; display:block;"><input type="text"
                                                                                                      size="6"
                                                                                                      id="trap_val3"
                                                                                                      class="calc-input"
                                                                                                      value=""></div>
                                        <div id="div_trap3" style="float:left; display:block; margin-left:3px;">
                                            <select id="trap_units3">
                                                <option value="" selected="selected"></option>
                                                <option value="mm" selected="selected">мм</option>
                                                <option value="cm">см</option>
                                                <option value="m">м</option>
                                                <option value="km">км</option>
                                                <option value="f">                                            @lang('value.feet') </option>
                                                <option value="ya">@lang('value.yards') </option>
                                                <option value="d">@lang('value.inches') </option>
                                                <option value="ml">@lang('value.miles') </option>
                                            </select>
                                        </div>

                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div id="div_trap5"
                                             style="float:left; width:14px; padding-top:4px; display:none;"><span
                                                    id="trap_name4">d=</span></div>
                                        <div id="div_trap6" style="float:left; display:none;"><input type="text"
                                                                                                     size="6"
                                                                                                     id="trap_val4"
                                                                                                     class="calc-input"
                                                                                                     value=""></div>
                                        <div id="div_trap7" style="float:left; display:none; margin-left:3px;">
                                            <select id="trap_units4" class="">
                                                <option value="" selected="selected"></option>
                                                <option value="mm" selected="selected">мм</option>
                                                <option value="cm">см</option>
                                                <option value="m">м</option>
                                                <option value="km">км</option>
                                                <option value="f">                                            @lang('value.feet') </option>
                                                <option value="ya">@lang('value.yards') </option>
                                                <option value="d">@lang('value.inches') </option>
                                                <option value="ml">@lang('value.miles') </option>
                                            </select>
                                        </div>

                                    </td>
                                    <td>
                                        <div id="btn_trap" style="position:relative; left:-156px;">
                                            <a id="btn_calculate_trap"
                                               class="calc-btn btn-calculate">{{__('calc.calculate')}}</a>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>

                        <div class="calc-footer">

                            <div id="div_answer_trap"
                                 style="margin:0 auto; position:relative; left: 20px; display:none;">
                                <div style="position:relative; top:0px; color:#F00; font-size:14px; padding-left:0px;">
                                    {{__('calc.answer')}}:
                                </div>
                                <div>S=<span id="a_trap" class="answer_s"> 1111 </span>
                                    <select id="trap_units5">
                                        <option value="" selected="selected"></option>
                                        <option value="mm">@lang('value.sq') .мм</option>
                                        <option value="cm">@lang('value.sq') .см</option>
                                        <option value="m">@lang('value.sq') .м</option>
                                        <option value="km">@lang('value.sq') .км</option>
                                        <option value="f">@lang('value.sq') . @lang('value.feet') </option>
                                        <option value="ya">@lang('value.sq') .@lang('value.yards') </option>
                                        <option value="d">@lang('value.sq') .@lang('value.inches') </option>
                                        <option value="ml">@lang('value.sq') .@lang('value.miles') </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
                <br>
                <div class="moduletable-adsdiv">


                    <div class="custom-adsdiv">
                        <p align="center">

                        </p>
                        <div style="max-width:728px; margin:0 auto;">
                            <script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- calc.by 1a -->
                            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-4488642245391999"
                                 data-ad-slot="8121380263" data-ad-format="auto"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                        <p></p></div>
                </div>

                <br>
                <br>


            </div>
            @include('template.show_theory')
        </div>
        @include('baners.right_banner')
    </div>
@endsection
@push('script')
<script>

    jQuery(function ($) {
        var val_rect1 = "";
        var val_rect2 = "";
        var rec_par1 = "";
        var rec_par2 = "";
        var rec_par3 = "";


        $('#btn_calculate_rect').click(function () {
            calculate_s_rect();
        });

        $('#rec_par3').click(function () {
            calculate_result_rect();
        });

        $('#tri_var').change(function () {
            change_variant_triangle();
        });

        $('#btn_calculate_triangle').click(function () {
            calculate_s_triangle();
        });

        $('#tri_units5').click(function () {
            calculate_result_tri();
        });

        $('#par_var').change(function () {
            change_variant_parallelogram();
        });

        $('#btn_calculate_parallelogram').click(function () {
            calculate_s_parallelogram();
        });

        $('#par_units5').click(function () {
            calculate_result_par();
        });

        $('#pol_var').change(function () {
            change_variant_polygon();
        });

        $('#btn_calculate_polygon').click(function () {
            calculate_s_polygon();
        });

        $('#pol_units5').click(function () {
            calculate_result_pol();
        });

        $(':radio[name=r-d]').change(function () {
            var par = $(this).val();
            change_variant_circle(par);
        });

        $('#btn_calculate_circle').click(function () {
            calculate_s_circle();
        });

        $('#cir_units5').click(function () {
            calculate_result_cir();
        });

        $('#btn_calculate_ellipse').click(function () {
            calculate_s_ellipse();
        });

        $('#ell_units5').click(function () {
            calculate_result_ell();
        });

        $(':radio[name=a-l]').change(function () {
            var par = $(this).val();
            change_variant_sector(par);
        });

        $('#btn_calculate_sector').click(function () {
            calculate_s_sector();
        });

        $('#sec_units5').click(function () {
            calculate_result_sec();
        });

        $('#trap_var').change(function () {
            change_variant_trapeze();
        });

        $('#btn_calculate_trap').click(function () {
            calculate_s_trapeze();
        });

        $('#trap_units5').click(function () {
            calculate_result_trap();
        });

        var check_width_conent = function () {
            var width_content = $('.article-content').width();
            if (width_content <= 720) $('.calc_area').addClass('calc-wide');
            else $('.calc_area').removeClass('calc-wide');
        }

        function calculate_s_rect() {
            val_rect1 = $("#val_rect1").val();
            val_rect2 = $("#val_rect2").val();
            rec_par1 = $("#rec_par1").val();
            rec_par2 = $("#rec_par2").val();

            val_rect1 = val_rect1.replace(",", ".");
            val_rect2 = val_rect2.replace(",", ".");

            if (val_rect1 == "" || val_rect2 == "") {
                alert("Поля, соответствующие значениям сторон прямоугольника, должны быть заполнены!");
            }
            else {
                if (rec_par1 == "" || rec_par2 == "") {
                    alert("Не указаны единицы измерения!");
                }
                else {

                    switch (rec_par1) {
                        case "mm":
                            val_rect1 = parseFloat(val_rect1) * 0.001;
                            s = 0.001;
                            break;
                        case "cm":
                            val_rect1 = parseFloat(val_rect1) * 0.01;
                            s = 0.01;
                            break;
                        case "m":
                            val_rect1 = parseFloat(val_rect1) * 1;
                            s = 1;
                            break;
                        case "km":
                            val_rect1 = parseFloat(val_rect1) * 1000;
                            s = 1000;
                            break;
                        case "f":
                            val_rect1 = parseFloat(val_rect1) * 0.3048;
                            s = 0.3048;
                            break;
                        case "ya":
                            val_rect1 = parseFloat(val_rect1) * 0.9144;
                            s = 0.9144;
                            break;
                        case "d":
                            val_rect1 = parseFloat(val_rect1) * 0.0254;
                            s = 0.0254;
                            break;
                        case "ml":
                            val_rect1 = parseFloat(val_rect1) * 1609.344;
                            s = 1609.344;
                            break;
                    }
                    switch (rec_par2) {
                        case "mm":
                            val_rect2 = parseFloat(val_rect2) * 0.001;
                            break;
                        case "cm":
                            val_rect2 = parseFloat(val_rect2) * 0.01;
                            break;
                        case "m":
                            val_rect2 = parseFloat(val_rect2) * 1;
                            break;
                        case "km":
                            val_rect2 = parseFloat(val_rect2) * 1000;
                            break;
                        case "f":
                            val_rect2 = parseFloat(val_rect2) * 0.3048;
                            break;
                        case "ya":
                            val_rect2 = parseFloat(val_rect2) * 0.9144;
                            break;
                        case "d":
                            val_rect2 = parseFloat(val_rect2) * 0.0254;
                            break;
                        case "ml":
                            val_rect2 = parseFloat(val_rect2) * 1609.344;
                            break;
                    }

                    s_rect_metr = parseFloat(val_rect1) * parseFloat(val_rect2);
                    s_rect = s_rect_metr / (s * s);
                    s_rect = Number(s_rect.toFixed(12));

                    /*s_rect1=s_rect*1000*1000;
                     s_rect2=s_rect*10.763911;
                     s_rect3=s_rect*100*100;
                     s_rect4=s_rect*1.195990;
                     s_rect5=s_rect*1;
                     s_rect6=s_rect*1550.0031;
                     s_rect7=s_rect*0.001*0.001;
                     s_rect8=s_rect*0.000621371192*0.000621371192;*/
                    $("#a_rect").html(s_rect);
                    $("#div_answer").css("display", "block");
                    $("#rec_par3").val(rec_par1);
                }
            }
        }

        function calculate_result_rect() {
            s_rectNew = "";
            rec_par3 = $("#rec_par3").val();

            switch (rec_par3) {
                case "mm":
                    s_rectNew = s_rect_metr / (0.001 * 0.001);
                    break;
                case "cm":
                    s_rectNew = s_rect_metr / (0.01 * 0.01);
                    break;
                case "m":
                    s_rectNew = s_rect_metr / 1;
                    break;
                case "km":
                    s_rectNew = s_rect_metr / (1000 * 1000);
                    break;
                case "f":
                    s_rectNew = s_rect_metr / (0.3048 * 0.3048);
                    break;
                case "ya":
                    s_rectNew = s_rect_metr / (0.9144 * 0.9144);
                    break;
                case "d":
                    s_rectNew = s_rect_metr / (0.0254 * 0.0254);
                    break;
                case "ml":
                    s_rectNew = s_rect_metr / (1609.344 * 1609.344);
                    break;
            }
            s_rectNew = Number(s_rectNew.toFixed(11));
            $("#a_rect").html(s_rectNew);
        }

// JavaScript Document
// Калькулятор для расчета площади треугольника

        var tri_var = "";
        var tri_val1 = "";
        var tri_val2 = "";
        var tri_val3 = "";
        var tri_units1 = "";
        var tri_units2 = "";
        var tri_units3 = "";
        var tri_units4 = "";
        var tri_units5 = "";
        var s_tri_metr = "";
        var s_tri = "";
        var s_triNew = "";

        function change_variant_triangle() {

            tri_var = $("#tri_var").val();

            switch (tri_var) {
                case "var1":
                    $("#tri_pic").attr('src', '/images/math/area_triangle1.png');
                    $("#tri_name2").html("b=");
                    $("#tri_name3").html("c=");
                    $("#div_tri2").css("display", "block");
                    $("#div_tri3").css("display", "block");
                    $("#div_tri4").css("display", "none");
                    $("#div_answer_tri").css("display", "none");
                    break;
                case "var2":
                    $("#tri_pic").attr('src', '/images/math/area_triangle2.png');
                    $("#tri_name2").html("h=");
                    $("#tri_name3").html("&nbsp;&nbsp;");
                    $("#div_tri2").css("display", "none");
                    $("#div_tri3").css("display", "none");
                    $("#div_tri4").css("display", "none");
                    $("#div_answer_tri").css("display", "none");
                    break;
                case "var3":
                    $("#tri_pic").attr('src', '/images/math/area_triangle3.png');
                    $("#tri_name2").html("b=");
                    $("#tri_name3").html("&#947;=");
                    $("#div_tri2").css("display", "block");
                    $("#div_tri3").css("display", "none");
                    $("#div_tri4").css("display", "block");
                    $("#div_answer_tri").css("display", "none");
                    break;
            }
        }


        function calculate_s_triangle() {
            tri_var = $("#tri_var").val();


            if (tri_var == "var1") {
                tri_val1 = $("#tri_val1").val();
                tri_val2 = $("#tri_val2").val();
                tri_val3 = $("#tri_val3").val();
                tri_units1 = $("#tri_units1").val();
                tri_units2 = $("#tri_units2").val();
                tri_units3 = $("#tri_units3").val();

                tri_val1 = tri_val1.replace(",", ".");
                tri_val2 = tri_val2.replace(",", ".");
                tri_val3 = tri_val3.replace(",", ".");

                if (tri_val1 == "" || tri_val2 == "" || tri_val3 == "") {
                    alert("Поля, соответствующие значениям сторон треугольника, должны быть заполнены!");
                }
                else {

                    if (tri_units1 == "" || tri_units2 == "" || tri_units3 == "") {

                        alert("Не указаны единицы измерения!");
                    }
                    else {

                        switch (tri_units1) {
                            case "mm":
                                tri_val1 = parseFloat(tri_val1) * 0.001;
                                s = 0.001;
                                break;
                            case "cm":
                                tri_val1 = parseFloat(tri_val1) * 0.01;
                                s = 0.01;
                                break;
                            case "m":
                                tri_val1 = parseFloat(tri_val1) * 1;
                                s = 1;
                                break;
                            case "km":
                                tri_val1 = parseFloat(tri_val1) * 1000;
                                s = 1000;
                                break;
                            case "f":
                                tri_val1 = parseFloat(tri_val1) * 0.3048;
                                s = 0.3048;
                                break;
                            case "ya":
                                tri_val1 = parseFloat(tri_val1) * 0.9144;
                                s = 0.9144;
                                break;
                            case "d":
                                tri_val1 = parseFloat(tri_val1) * 0.0254;
                                s = 0.0254;
                                break;
                            case "ml":
                                tri_val1 = parseFloat(tri_val1) * 1609.344;
                                s = 1609.344;
                                break;
                        }
                        switch (tri_units2) {
                            case "mm":
                                tri_val2 = parseFloat(tri_val2) * 0.001;
                                break;
                            case "cm":
                                tri_val2 = parseFloat(tri_val2) * 0.01;
                                break;
                            case "m":
                                tri_val2 = parseFloat(tri_val2) * 1;
                                break;
                            case "km":
                                tri_val2 = parseFloat(tri_val2) * 1000;
                                break;
                            case "f":
                                tri_val2 = parseFloat(tri_val2) * 0.3048;
                                break;
                            case "ya":
                                tri_val2 = parseFloat(tri_val2) * 0.9144;
                                break;
                            case "d":
                                tri_val2 = parseFloat(tri_val2) * 0.0254;
                                break;
                            case "ml":
                                tri_val2 = parseFloat(tri_val2) * 1609.344;
                                break;
                        }
                        switch (tri_units3) {
                            case "mm":
                                tri_val3 = parseFloat(tri_val3) * 0.001;
                                break;
                            case "cm":
                                tri_val3 = parseFloat(tri_val3) * 0.01;
                                break;
                            case "m":
                                tri_val3 = parseFloat(tri_val3) * 1;
                                break;
                            case "km":
                                tri_val3 = parseFloat(tri_val3) * 1000;
                                break;
                            case "f":
                                tri_val3 = parseFloat(tri_val3) * 0.3048;
                                break;
                            case "ya":
                                tri_val3 = parseFloat(tri_val3) * 0.9144;
                                break;
                            case "d":
                                tri_val3 = parseFloat(tri_val3) * 0.0254;
                                break;
                            case "ml":
                                tri_val3 = parseFloat(tri_val3) * 1609.344;
                                break;
                        }
                        p = (parseFloat(tri_val1) + parseFloat(tri_val2) + parseFloat(tri_val3)) / 2;

                        s_tri_metr = Math.sqrt(p * (p - parseFloat(tri_val1)) * (p - parseFloat(tri_val2)) * (p - parseFloat(tri_val3)));
                        s_tri = s_tri_metr / (s * s);
                        s_tri = Number(s_tri.toFixed(12));


                        $("#a_tri").html(s_tri);
                        $("#div_answer_tri").css("display", "block");
                        $("#tri_units5").val(tri_units1);
                    }
                }
            }

            if (tri_var == "var2") {
                tri_val1 = $("#tri_val1").val();
                tri_val2 = $("#tri_val2").val();

                tri_units1 = $("#tri_units1").val();
                tri_units2 = $("#tri_units2").val();


                if (tri_val1 == "" || tri_val2 == "") {
                    alert("Поля, соответствующие значениям сторон треугольника, должны быть заполнены!");
                }
                else {

                    if (tri_units1 == "" || tri_units2 == "") {

                        alert("Не указаны единицы измерения!");
                    }
                    else {

                        switch (tri_units1) {
                            case "mm":
                                tri_val1 = parseFloat(tri_val1) * 0.001;
                                s = 0.001;
                                break;
                            case "cm":
                                tri_val1 = parseFloat(tri_val1) * 0.01;
                                s = 0.01;
                                break;
                            case "m":
                                tri_val1 = parseFloat(tri_val1) * 1;
                                s = 1;
                                break;
                            case "km":
                                tri_val1 = parseFloat(tri_val1) * 1000;
                                s = 1000;
                                break;
                            case "f":
                                tri_val1 = parseFloat(tri_val1) * 0.3048;
                                s = 0.3048;
                                break;
                            case "ya":
                                tri_val1 = parseFloat(tri_val1) * 0.9144;
                                s = 0.9144;
                                break;
                            case "d":
                                tri_val1 = parseFloat(tri_val1) * 0.0254;
                                s = 0.0254;
                                break;
                            case "ml":
                                tri_val1 = parseFloat(tri_val1) * 1609.344;
                                s = 1609.344;
                                break;
                        }
                        switch (tri_units2) {
                            case "mm":
                                tri_val2 = parseFloat(tri_val2) * 0.001;
                                break;
                            case "cm":
                                tri_val2 = parseFloat(tri_val2) * 0.01;
                                break;
                            case "m":
                                tri_val2 = parseFloat(tri_val2) * 1;
                                break;
                            case "km":
                                tri_val2 = parseFloat(tri_val2) * 1000;
                                break;
                            case "f":
                                tri_val2 = parseFloat(tri_val2) * 0.3048;
                                break;
                            case "ya":
                                tri_val2 = parseFloat(tri_val2) * 0.9144;
                                break;
                            case "d":
                                tri_val2 = parseFloat(tri_val2) * 0.0254;
                                break;
                            case "ml":
                                tri_val2 = parseFloat(tri_val2) * 1609.344;
                                break;
                        }


                        s_tri_metr = 0.5 * parseFloat(tri_val1) * parseFloat(tri_val2);
                        s_tri = s_tri_metr / (s * s);
                        s_tri = Number(s_tri.toFixed(12));


                        $("#a_tri").html(s_tri);
                        $("#div_answer_tri").css("display", "block");
                        $("#tri_units5").val(tri_units1);
                    }
                }

            }


            if (tri_var == "var3") {
                tri_val1 = $("#tri_val1").val();
                tri_val2 = $("#tri_val2").val();
                tri_val3 = $("#tri_val3").val();
                tri_units1 = $("#tri_units1").val();
                tri_units2 = $("#tri_units2").val();
                tri_units3 = $("#tri_units3").val();
                tri_units4 = $("#tri_units4").val();

                if (tri_val1 == "" || tri_val2 == "" || tri_val3 == "") {
                    alert("Поля, соответствующие значениям сторон треугольника, должны быть заполнены!");
                }
                else {

                    if (tri_units1 == "" || tri_units2 == "" || tri_units3 == "") {

                        alert("Не указаны единицы измерения!");
                    }
                    else {

                        switch (tri_units1) {
                            case "mm":
                                tri_val1 = parseFloat(tri_val1) * 0.001;
                                s = 0.001;
                                break;
                            case "cm":
                                tri_val1 = parseFloat(tri_val1) * 0.01;
                                s = 0.01;
                                break;
                            case "m":
                                tri_val1 = parseFloat(tri_val1) * 1;
                                s = 1;
                                break;
                            case "km":
                                tri_val1 = parseFloat(tri_val1) * 1000;
                                s = 1000;
                                break;
                            case "f":
                                tri_val1 = parseFloat(tri_val1) * 0.3048;
                                s = 0.3048;
                                break;
                            case "ya":
                                tri_val1 = parseFloat(tri_val1) * 0.9144;
                                s = 0.9144;
                                break;
                            case "d":
                                tri_val1 = parseFloat(tri_val1) * 0.0254;
                                s = 0.0254;
                                break;
                            case "ml":
                                tri_val1 = parseFloat(tri_val1) * 1609.344;
                                s = 1609.344;
                                break;
                        }
                        switch (tri_units2) {
                            case "mm":
                                tri_val2 = parseFloat(tri_val2) * 0.001;
                                break;
                            case "cm":
                                tri_val2 = parseFloat(tri_val2) * 0.01;
                                break;
                            case "m":
                                tri_val2 = parseFloat(tri_val2) * 1;
                                break;
                            case "km":
                                tri_val2 = parseFloat(tri_val2) * 1000;
                                break;
                            case "f":
                                tri_val2 = parseFloat(tri_val2) * 0.3048;
                                break;
                            case "ya":
                                tri_val2 = parseFloat(tri_val2) * 0.9144;
                                break;
                            case "d":
                                tri_val2 = parseFloat(tri_val2) * 0.0254;
                                break;
                            case "ml":
                                tri_val2 = parseFloat(tri_val2) * 1609.344;
                                break;
                        }
                        switch (tri_units4) {
                            case "deg":
                                tri_val3 = parseFloat(tri_val3) * 3.14159265 / 180;
                                break;
                            case "rad":
                                tri_val3 = parseFloat(tri_val3) * 1;
                                break;

                        }


                        s_tri_metr = 0.5 * parseFloat(tri_val1) * parseFloat(tri_val2) * Math.sin(parseFloat(tri_val3));
                        s_tri = s_tri_metr / (s * s);
                        s_tri = Number(s_tri.toFixed(12));


                        $("#a_tri").html(s_tri);
                        $("#div_answer_tri").css("display", "block");
                        $("#tri_units5").val(tri_units1);
                    }
                }
            }
        }

        function calculate_result_tri() {

            s_triNew = "";
            tri_units5 = $("#tri_units5").val();

            switch (tri_units5) {
                case "mm":
                    s_triNew = s_tri_metr / (0.001 * 0.001);
                    break;
                case "cm":
                    s_triNew = s_tri_metr / (0.01 * 0.01);
                    break;
                case "m":
                    s_triNew = s_tri_metr / 1;
                    break;
                case "km":
                    s_triNew = s_tri_metr / (1000 * 1000);
                    break;
                case "f":
                    s_triNew = s_tri_metr / (0.3048 * 0.3048);
                    break;
                case "ya":
                    s_triNew = s_tri_metr / (0.9144 * 0.9144);
                    break;
                case "d":
                    s_triNew = s_tri_metr / (0.0254 * 0.0254);
                    break;
                case "ml":
                    s_triNew = s_tri_metr / (1609.344 * 1609.344);
                    break;
            }
            s_triNew = Number(s_triNew.toFixed(11));
            $("#a_tri").html(s_triNew);
        }

// JavaScript Document
// Калькулятор для расчета площади параллелограмма

        var par_var = "";
        var par_val1 = "";
        var par_val2 = "";
        var par_val3 = "";
        var par_units1 = "";
        var par_units2 = "";
        var par_units3 = "";
        var par_units4 = "";
        var par_units5 = "";
        var s_par_metr = "";
        var s_par = "";
        var s_parNew = "";

        function change_variant_parallelogram() {

            par_var = $("#par_var").val();

            switch (par_var) {
                case "var1":
                    $("#par_pic").attr("src", "/images/math/area_parallelogram1.png");
                    $("#par_name1").html("a=");
                    $("#par_name2").html("h=");

                    $("#div_par1").css("display", "none");
                    $("#div_par2").css("display", "none");
                    $("#div_par3").css("display", "none");
                    $("#div_par4").css("display", "none");


                    $("#div_answer_par").css("display", "none");
                    break;
                case "var2":
                    $("#par_pic").attr("src", "/images/math/area_parallelogram2.png");
                    $("#par_name1").html("a=");
                    $("#par_name2").html("b=");
                    $("#par_name3").html("&#945;=");
                    $("#div_par1").css("display", "block");
                    $("#div_par2").css("display", "block");
                    $("#div_par3").css("display", "none");
                    $("#div_par4").css("display", "block");
                    $("#div_answer_par").css("display", "none");
                    break;
                case "var3":
                    $("#par_pic").attr("src", "/images/math/area_parallelogram3.png");
                    $("#par_name1").html("D=");
                    $("#par_name2").html("d=");
                    $("#par_name3").html("&#945;=");
                    $("#div_par1").css("display", "block");
                    $("#div_par2").css("display", "block");
                    $("#div_par3").css("display", "none");
                    $("#div_par4").css("display", "block");
                    $("#div_answer_par").css("display", "none");
                    break;
            }
        }


        function calculate_s_parallelogram() {
            par_var = $("#par_var").val();


            if (par_var == "var1") {
                par_val1 = $("#par_val1").val();
                par_val2 = $("#par_val2").val();

                par_units1 = $("#par_units1").val();
                par_units2 = $("#par_units2").val();

                par_val1 = par_val1.replace(",", ".");
                par_val2 = par_val2.replace(",", ".");

                if (par_val1 == "" || par_val2 == "") {
                    alert("Поля, соответствующие значениям стороны и высоты параллелограмма, должны быть заполнены!");
                }
                else {

                    if (par_units1 == "" || par_units2 == "") {

                        alert("Не указаны единицы измерения!");
                    }
                    else {

                        switch (par_units1) {
                            case "mm":
                                par_val1 = parseFloat(par_val1) * 0.001;
                                s = 0.001;
                                break;
                            case "cm":
                                par_val1 = parseFloat(par_val1) * 0.01;
                                s = 0.01;
                                break;
                            case "m":
                                par_val1 = parseFloat(par_val1) * 1;
                                s = 1;
                                break;
                            case "km":
                                par_val1 = parseFloat(par_val1) * 1000;
                                s = 1000;
                                break;
                            case "f":
                                par_val1 = parseFloat(par_val1) * 0.3048;
                                s = 0.3048;
                                break;
                            case "ya":
                                par_val1 = parseFloat(par_val1) * 0.9144;
                                s = 0.9144;
                                break;
                            case "d":
                                par_val1 = parseFloat(par_val1) * 0.0254;
                                s = 0.0254;
                                break;
                            case "ml":
                                par_val1 = parseFloat(par_val1) * 1609.344;
                                s = 1609.344;
                                break;
                        }
                        switch (par_units2) {
                            case "mm":
                                par_val2 = parseFloat(par_val2) * 0.001;
                                break;
                            case "cm":
                                par_val2 = parseFloat(par_val2) * 0.01;
                                break;
                            case "m":
                                par_val2 = parseFloat(par_val2) * 1;
                                break;
                            case "km":
                                par_val2 = parseFloat(par_val2) * 1000;
                                break;
                            case "f":
                                par_val2 = parseFloat(par_val2) * 0.3048;
                                break;
                            case "ya":
                                par_val2 = parseFloat(par_val2) * 0.9144;
                                break;
                            case "d":
                                par_val2 = parseFloat(par_val2) * 0.0254;
                                break;
                            case "ml":
                                par_val2 = parseFloat(par_val2) * 1609.344;
                                break;
                        }


                        s_par_metr = parseFloat(par_val1) * parseFloat(par_val2);
                        s_par = s_par_metr / (s * s);
                        s_par = Number(s_par.toFixed(12));


                        $("#a_par").html(s_par);
                        $("#div_answer_par").css("display", "block");
                        $("#par_units5").val(par_units1);
                    }
                }
            }

            if (par_var == "var2" || par_var == "var3") {
                par_val1 = $("#par_val1").val();
                par_val2 = $("#par_val2").val();
                par_val3 = $("#par_val3").val();

                par_units1 = $("#par_units1").val();
                par_units2 = $("#par_units2").val();
                par_units3 = $("#par_units3").val();


                if (par_val1 == "" || par_val2 == "" || par_val3 == "") {
                    alert("Поля, соответствующие значениям сторона параллелограмма и углу, должны быть заполнены!");
                }
                else {

                    if (par_units1 == "" || par_units2 == "") {

                        alert("Не указаны единицы измерения!");
                    }
                    else {

                        switch (par_units1) {
                            case "mm":
                                par_val1 = parseFloat(par_val1) * 0.001;
                                s = 0.001;
                                break;
                            case "cm":
                                par_val1 = parseFloat(par_val1) * 0.01;
                                s = 0.01;
                                break;
                            case "m":
                                par_val1 = parseFloat(par_val1) * 1;
                                s = 1;
                                break;
                            case "km":
                                par_val1 = parseFloat(par_val1) * 1000;
                                s = 1000;
                                break;
                            case "f":
                                par_val1 = parseFloat(par_val1) * 0.3048;
                                s = 0.3048;
                                break;
                            case "ya":
                                par_val1 = parseFloat(par_val1) * 0.9144;
                                s = 0.9144;
                                break;
                            case "d":
                                par_val1 = parseFloat(par_val1) * 0.0254;
                                s = 0.0254;
                                break;
                            case "ml":
                                par_val1 = parseFloat(par_val1) * 1609.344;
                                s = 1609.344;
                                break;
                        }
                        switch (par_units2) {
                            case "mm":
                                par_val2 = parseFloat(par_val2) * 0.001;
                                break;
                            case "cm":
                                par_val2 = parseFloat(par_val2) * 0.01;
                                break;
                            case "m":
                                par_val2 = parseFloat(par_val2) * 1;
                                break;
                            case "km":
                                par_val2 = parseFloat(par_val2) * 1000;
                                break;
                            case "f":
                                par_val2 = parseFloat(par_val2) * 0.3048;
                                break;
                            case "ya":
                                par_val2 = parseFloat(par_val2) * 0.9144;
                                break;
                            case "d":
                                par_val2 = parseFloat(par_val2) * 0.0254;
                                break;
                            case "ml":
                                par_val2 = parseFloat(par_val2) * 1609.344;
                                break;
                        }

                        switch (par_units4) {
                            case "deg":
                                par_val3 = parseFloat(par_val3) * 3.14159265 / 180;
                                break;
                            case "rad":
                                par_val3 = parseFloat(par_val3) * 1;
                                break;

                        }

                        if (par_var == "var2") {
                            s_par_metr = parseFloat(par_val1) * parseFloat(par_val2) * Math.sin(par_val3);
                        }
                        else {
                            s_par_metr = 0.5 * parseFloat(par_val1) * parseFloat(par_val2) * Math.sin(par_val3);
                        }
                        s_par = s_par_metr / (s * s);
                        s_par = Number(s_par.toFixed(12));


                        $("#a_par").html(s_par);
                        $("#div_answer_par").css("display", "block");
                        $("#par_units5").val(par_units1);
                    }
                }

            }


        }

        function calculate_result_par() {

            s_parNew = "";
            par_units5 = $("#par_units5").val();

            switch (par_units5) {
                case "mm":
                    s_parNew = s_par_metr / (0.001 * 0.001);
                    break;
                case "cm":
                    s_parNew = s_par_metr / (0.01 * 0.01);
                    break;
                case "m":
                    s_parNew = s_par_metr / 1;
                    break;
                case "km":
                    s_parNew = s_par_metr / (1000 * 1000);
                    break;
                case "f":
                    s_parNew = s_par_metr / (0.3048 * 0.3048);
                    break;
                case "ya":
                    s_parNew = s_par_metr / (0.9144 * 0.9144);
                    break;
                case "d":
                    s_parNew = s_par_metr / (0.0254 * 0.0254);
                    break;
                case "ml":
                    s_parNew = s_par_metr / (1609.344 * 1609.344);
                    break;
            }
            s_parNew = Number(s_parNew.toFixed(11));
            $("#a_par").html(s_parNew);
        }

// JavaScript Document

// JavaScript Document
// Калькулятор для расчета площади пр. многоугольника

        var pol_var = "";
        var pol_val1 = "";
        var pol_val2 = "";
        var pol_val3 = "";
        var pol_units1 = "";
        var pol_units2 = "";
        var pol_units3 = "";
        var pol_units4 = "";
        var pol_units5 = "";
        var s_pol_metr = "";
        var s_pol = "";
        var s_polNew = "";

        function change_variant_polygon() {

            pol_var = $("#pol_var").val();

            switch (pol_var) {
                case "var1":
                    $("#pol_pic").attr("src", "/images/math/area_polygon1.png");
                    $("#pol_name2").html("a=");
                    $("#div_answer_pol").css("display", "none");
                    break;
                case "var2":
                    $("#pol_pic").attr("src", "/images/math/area_polygon2.png");
                    $("#pol_name2").html("R=");
                    $("#div_answer_pol").css("display", "none");
                    break;
                case "var3":
                    $("#pol_pic").attr("src", "/images/math/area_polygon3.png");
                    $("#pol_name2").html("r=");
                    $("#div_answer_pol").css("display", "none");
                    break;
            }
        }

        function calculate_s_polygon() {
            pol_var = $("#pol_var").val();


            pol_val1 = $("#pol_units1").val();
            pol_val2 = $("#pol_val2").val();
            pol_units2 = $("#pol_units2").val();

            pol_val2 = pol_val2.replace(",", ".");

            if (pol_val2 == "") {
                alert("Поля, соответствующие значениям стороны и высоты параллелограмма, должны быть заполнены!");
            }
            else {

                if (pol_units2 == "") {

                    alert("Не указаны единицы измерения!");
                }
                else {


                    switch (pol_units2) {
                        case "mm":
                            pol_val2 = parseFloat(pol_val2) * 0.001;
                            s = 0.001;
                            break;
                        case "cm":
                            pol_val2 = parseFloat(pol_val2) * 0.01;
                            s = 0.01;
                            break;
                        case "m":
                            pol_val2 = parseFloat(pol_val2) * 1;
                            s = 1;
                            break;
                        case "km":
                            pol_val2 = parseFloat(pol_val2) * 1000;
                            s = 1000;
                            break;
                        case "f":
                            pol_val2 = parseFloat(pol_val2) * 0.3048;
                            s = 0.3048;
                            break;
                        case "ya":
                            pol_val2 = parseFloat(pol_val2) * 0.9144;
                            s = 0.9144;
                            break;
                        case "d":
                            pol_val2 = parseFloat(pol_val2) * 0.0254;
                            s = 0.0254;
                            break;
                        case "ml":
                            pol_val2 = parseFloat(pol_val2) * 1609.344;
                            s = 1609.344;
                            break;
                    }


                    if (pol_var == "var1") {
                        s_pol_metr = 0.25 * parseFloat(pol_val1) * pol_val2 * pol_val2 * 1 / (Math.tan(3.141592653589793 / parseFloat(pol_val1)));
                    }
                    else {
                        if (pol_var == "var2") {
                            s_pol_metr = 0.5 * parseFloat(pol_val1) * pol_val2 * pol_val2 * (Math.sin(2 * 3.141592653589793 / parseFloat(pol_val1)));
                        }
                        else {
                            s_pol_metr = parseFloat(pol_val1) * pol_val2 * pol_val2 * (Math.tan(3.141592653589793 / parseFloat(pol_val1)));
                        }

                    }
                    s_pol = s_pol_metr / (s * s);
                    s_pol = Number(s_pol.toFixed(12));


                    $("#a_pol").html(s_pol);
                    $("#div_answer_pol").css("display", "block");
                    $("#pol_units5").val(pol_units2);
                }
            }

        }

        function calculate_result_pol() {

            s_polNew = "";
            pol_units5 = $("#pol_units5").val();

            switch (pol_units5) {
                case "mm":
                    s_polNew = s_pol_metr / (0.001 * 0.001);
                    break;
                case "cm":
                    s_polNew = s_pol_metr / (0.01 * 0.01);
                    break;
                case "m":
                    s_polNew = s_pol_metr / 1;
                    break;
                case "km":
                    s_polNew = s_pol_metr / (1000 * 1000);
                    break;
                case "f":
                    s_polNew = s_pol_metr / (0.3048 * 0.3048);
                    break;
                case "ya":
                    s_polNew = s_pol_metr / (0.9144 * 0.9144);
                    break;
                case "d":
                    s_polNew = s_pol_metr / (0.0254 * 0.0254);
                    break;
                case "ml":
                    s_polNew = s_pol_metr / (1609.344 * 1609.344);
                    break;
            }
            s_polNew = Number(s_polNew.toFixed(11));
            $("#a_pol").html(s_polNew);
        }

// Калькулятор для расчета площади круга

        var cir_var = "r";
        var cir_val1 = "";
        var cir_val2 = "";
        var cir_val3 = "";
        var cir_units1 = "";
        var cir_units2 = "";
        var cir_units3 = "";
        var cir_units4 = "";
        var cir_units5 = "";
        var s_cir_metr = "";
        var s_cir = "";
        var s_cirNew = "";


        function change_variant_circle(var_circle) {


            switch (var_circle) {
                case "r":
                    $("#cir_pic").attr("src", "/images/math/area_circle1.png");
                    $("#cir_name1").html("r=");
                    $("#div_answer_cir").css("display", "none");
                    cir_var = "r";
                    break;
                case "d":
                    $("#cir_pic").attr("src", "/images/math/area_circle2.png");
                    $("#cir_name1").html("d=");
                    $("#div_answer_cir").css("display", "none");
                    cir_var = "d";
                    break;

            }
        }

        function calculate_s_circle() {

            cir_val1 = $("#cir_val1").val();
            cir_units1 = $("#cir_units1").val();

            cir_val1 = cir_val1.replace(",", ".");

            if (cir_val1 == "") {
                alert("Поле, соответствующее значению радиуса или диаметра круга, должно быть заполнено!");
            }
            else {

                if (cir_units1 == "") {

                    alert("Не указаны единицы измерения!");
                }
                else {

                    switch (cir_units1) {
                        case "mm":
                            cir_val1 = parseFloat(cir_val1) * 0.001;
                            s = 0.001;
                            break;
                        case "cm":
                            cir_val1 = parseFloat(cir_val1) * 0.01;
                            s = 0.01;
                            break;
                        case "m":
                            cir_val1 = parseFloat(cir_val1) * 1;
                            s = 1;
                            break;
                        case "km":
                            cir_val1 = parseFloat(cir_val1) * 1000;
                            s = 1000;
                            break;
                        case "f":
                            cir_val1 = parseFloat(cir_val1) * 0.3048;
                            s = 0.3048;
                            break;
                        case "ya":
                            cir_val1 = parseFloat(cir_val1) * 0.9144;
                            s = 0.9144;
                            break;
                        case "d":
                            cir_val1 = parseFloat(cir_val1) * 0.0254;
                            s = 0.0254;
                            break;
                        case "ml":
                            cir_val1 = parseFloat(cir_val1) * 1609.344;
                            s = 1609.344;
                            break;
                    }


                    if (cir_var == "r") {
                        s_cir_metr = 3.141592653589793 * parseFloat(cir_val1) * parseFloat(cir_val1);
                    }

                    if (cir_var == "d") {
                        s_cir_metr = 3.141592653589793 * parseFloat(cir_val1) * parseFloat(cir_val1) * 0.25;
                    }

                    s_cir = s_cir_metr / (s * s);
                    s_cir = Number(s_cir.toFixed(12));


                    $("#a_cir").html(s_cir);
                    $("#div_answer_cir").css("display", "block");
                    $("#cir_units5").val(cir_units1);
                }
            }

        }

        function calculate_result_cir() {

            s_cirNew = "";
            cir_units5 = $("#cir_units5").val();

            switch (cir_units5) {
                case "mm":
                    s_cirNew = s_cir_metr / (0.001 * 0.001);
                    break;
                case "cm":
                    s_cirNew = s_cir_metr / (0.01 * 0.01);
                    break;
                case "m":
                    s_cirNew = s_cir_metr / 1;
                    break;
                case "km":
                    s_cirNew = s_cir_metr / (1000 * 1000);
                    break;
                case "f":
                    s_cirNew = s_cir_metr / (0.3048 * 0.3048);
                    break;
                case "ya":
                    s_cirNew = s_cir_metr / (0.9144 * 0.9144);
                    break;
                case "d":
                    s_cirNew = s_cir_metr / (0.0254 * 0.0254);
                    break;
                case "ml":
                    s_cirNew = s_cir_metr / (1609.344 * 1609.344);
                    break;
            }
            s_cirNew = Number(s_cirNew.toFixed(11));
            $("#a_cir").html(s_cirNew);
        }

// Калькулятор для расчета площади эллипса

        var ell_var = "";
        var ell_val1 = "";
        var ell_val2 = "";
        var ell_val3 = "";
        var ell_units1 = "";
        var ell_units2 = "";
        var ell_units3 = "";
        var ell_units4 = "";
        var ell_units5 = "";
        var s_ell_metr = "";
        var s_ell = "";
        var s_ellNew = "";


        function calculate_s_ellipse() {
            ell_val1 = $("#ell_val1").val();
            ell_val2 = $("#ell_val2").val();
            ell_units1 = $("#ell_units1").val();
            ell_units2 = $("#ell_units2").val();

            ell_val1 = ell_val1.replace(",", ".");
            ell_val2 = ell_val2.replace(",", ".");

            if (ell_val1 == "" || ell_val2 == "") {
                alert("Поля, соответствующие значениям сторон прямоугольника, должны быть заполнены!");
            }
            else {
                if (ell_units1 == "" || ell_units2 == "") {
                    alert("Не указаны единицы измерения!");
                }
                else {

                    switch (ell_units1) {
                        case "mm":
                            ell_val1 = parseFloat(ell_val1) * 0.001;
                            s = 0.001;
                            break;
                        case "cm":
                            ell_val1 = parseFloat(ell_val1) * 0.01;
                            s = 0.01;
                            break;
                        case "m":
                            ell_val1 = parseFloat(ell_val1) * 1;
                            s = 1;
                            break;
                        case "km":
                            ell_val1 = parseFloat(ell_val1) * 1000;
                            s = 1000;
                            break;
                        case "f":
                            ell_val1 = parseFloat(ell_val1) * 0.3048;
                            s = 0.3048;
                            break;
                        case "ya":
                            ell_val1 = parseFloat(ell_val1) * 0.9144;
                            s = 0.9144;
                            break;
                        case "d":
                            ell_val1 = parseFloat(ell_val1) * 0.0254;
                            s = 0.0254;
                            break;
                        case "ml":
                            ell_val1 = parseFloat(ell_val1) * 1609.344;
                            s = 1609.344;
                            break;
                    }

                    switch (ell_units2) {
                        case "mm":
                            ell_val2 = parseFloat(ell_val2) * 0.001;
                            break;
                        case "cm":
                            ell_val2 = parseFloat(ell_val2) * 0.01;
                            break;
                        case "m":
                            ell_val2 = parseFloat(ell_val2) * 1;
                            break;
                        case "km":
                            ell_val2 = parseFloat(ell_val2) * 1000;
                            break;
                        case "f":
                            ell_val2 = parseFloat(ell_val2) * 0.3048;
                            break;
                        case "ya":
                            ell_val2 = parseFloat(ell_val2) * 0.9144;
                            break;
                        case "d":
                            ell_val2 = parseFloat(ell_val2) * 0.0254;
                            break;
                        case "ml":
                            ell_val2 = parseFloat(ell_val2) * 1609.344;
                            break;
                    }

                    s_ell_metr = 3.141592653589793 * parseFloat(ell_val1) * parseFloat(ell_val2);
                    s_ell = s_ell_metr / (s * s);
                    s_ell = Number(s_ell.toFixed(12));

                    $("#a_ell").html(s_ell);
                    $("#div_answer_ell").css("display", "block");
                    $("#ell_units5").val(ell_units1);
                }
            }
        }

        function calculate_result_ell() {
            s_ellNew = "";
            ell_units5 = $("#ell_units5").val();

            switch (ell_units5) {
                case "mm":
                    s_elltNew = s_ell_metr / (0.001 * 0.001);
                    break;
                case "cm":
                    s_elltNew = s_ell_metr / (0.01 * 0.01);
                    break;
                case "m":
                    s_elltNew = s_ell_metr / 1;
                    break;
                case "km":
                    s_elltNew = s_ell_metr / (1000 * 1000);
                    break;
                case "f":
                    s_elltNew = s_ell_metr / (0.3048 * 0.3048);
                    break;
                case "ya":
                    s_elltNew = s_ell_metr / (0.9144 * 0.9144);
                    break;
                case "d":
                    s_elltNew = s_ell_metr / (0.0254 * 0.0254);
                    break;
                case "ml":
                    s_elltNew = s_ell_metr / (1609.344 * 1609.344);
                    break;
            }
            s_ellNew = Number(s_elltNew.toFixed(11));
            $("#a_ell").html(s_ellNew);
        }

// Калькулятор для расчета площади эллипса

        var sec_var = "a";
        var sec_val1 = "";
        var sec_val2 = "";
        var sec_val3 = "";
        var sec_units1 = "";
        var sec_units2 = "";
        var sec_units3 = "";
        var sec_units4 = "";
        var sec_units5 = "";
        var s_sec_metr = "";
        var s_sec = "";
        var s_secNew = "";


        function change_variant_sector(var_sector) {


            switch (var_sector) {
                case "a":
                    $("#sec_pic").attr("src", "/images/math/area_sector1.png");
                    $("#sec_name3").html("&#952;=");
                    $("#div_answer_sec").css("display", "none");
                    $("#div_sec3").css("display", "none");
                    $("#div_sec4").css("display", "block");
                    sec_var = "a";
                    break;
                case "l":
                    $("#sec_pic").attr("src", "/images/math/area_sector2.png");
                    $("#sec_name3").html("L=");
                    $("#div_answer_sec").css("display", "none");
                    $("#div_sec3").css("display", "block");
                    $("#div_sec4").css("display", "none");
                    sec_var = "l";
                    break;

            }
        }

        function calculate_s_sector() {

            sec_val1 = $("#sec_val1").val();
            sec_val2 = $("#sec_val3").val();
            sec_units1 = $("#sec_units1").val();
            sec_units3 = $("#sec_units3").val();
            sec_units4 = $("#sec_units4").val();

            sec_val1 = sec_val1.replace(",", ".");
            sec_val2 = sec_val2.replace(",", ".");

            if (sec_val1 == "" || sec_val2 == "") {
                alert("Поля, соответствующие значению радиуса, углу или длине сектора, должны быть заполнены!");
            }
            else {

                switch (sec_units1) {
                    case "mm":
                        sec_val1 = parseFloat(sec_val1) * 0.001;
                        s = 0.001;
                        break;
                    case "cm":
                        sec_val1 = parseFloat(sec_val1) * 0.01;
                        s = 0.01;
                        break;
                    case "m":
                        sec_val1 = parseFloat(sec_val1) * 1;
                        s = 1;
                        break;
                    case "km":
                        sec_val1 = parseFloat(sec_val1) * 1000;
                        s = 1000;
                        break;
                    case "f":
                        sec_val1 = parseFloat(sec_val1) * 0.3048;
                        s = 0.3048;
                        break;
                    case "ya":
                        sec_val1 = parseFloat(sec_val1) * 0.9144;
                        s = 0.9144;
                        break;
                    case "d":
                        sec_val1 = parseFloat(sec_val1) * 0.0254;
                        s = 0.0254;
                        break;
                    case "ml":
                        sec_val1 = parseFloat(sec_val1) * 1609.344;
                        s = 1609.344;
                        break;
                }


                if (sec_var == "l") {
                    switch (sec_units3) {
                        case "mm":
                            sec_val2 = parseFloat(sec_val2) * 0.001;
                            break;
                        case "cm":
                            sec_val2 = parseFloat(sec_val2) * 0.01;
                            break;
                        case "m":
                            sec_val2 = parseFloat(sec_val2) * 1;
                            break;
                        case "km":
                            sec_val2 = parseFloat(sec_val2) * 1000;
                            break;
                        case "f":
                            sec_val2 = parseFloat(sec_val2) * 0.3048;
                            break;
                        case "ya":
                            sec_val2 = parseFloat(sec_val2) * 0.9144;
                            break;
                        case "d":
                            sec_val2 = parseFloat(sec_val2) * 0.0254;
                            break;
                        case "ml":
                            sec_val2 = parseFloat(sec_val2) * 1609.344;
                            break;
                    }


                    s_sec_metr = 0.5 * parseFloat(sec_val1) * parseFloat(sec_val1);
                }

                if (sec_var == "a") {
                    switch (sec_units4) {
                        case "deg":
                            sec_val2 = parseFloat(sec_val2) * 3.14159265 / 180;
                            break;
                        case "rad":
                            sec_val2 = parseFloat(sec_val2) * 1;
                            break;
                    }

                    s_sec_metr = parseFloat(sec_val1) * parseFloat(sec_val1) * parseFloat(sec_val2) * 0.5;

                }

                s_sec = s_sec_metr / (s * s);
                s_sec = Number(s_sec.toFixed(12));
                $("#a_sec").html(s_sec);
                $("#div_answer_sec").css("display", "block");
                $("#sec_units5").val(sec_units1);


            }

        }

        function calculate_result_sec() {

            s_secNew = "";
            sec_units5 = $("#sec_units5").val();

            switch (sec_units5) {
                case "mm":
                    s_secNew = s_sec_metr / (0.001 * 0.001);
                    break;
                case "cm":
                    s_secNew = s_sec_metr / (0.01 * 0.01);
                    break;
                case "m":
                    s_secNew = s_sec_metr / 1;
                    break;
                case "km":
                    s_secNew = s_sec_metr / (1000 * 1000);
                    break;
                case "f":
                    s_secNew = s_sec_metr / (0.3048 * 0.3048);
                    break;
                case "ya":
                    s_secNew = s_sec_metr / (0.9144 * 0.9144);
                    break;
                case "d":
                    s_secNew = s_sec_metr / (0.0254 * 0.0254);
                    break;
                case "ml":
                    s_secNew = s_sec_metr / (1609.344 * 1609.344);
                    break;
            }
            s_secNew = Number(s_secNew.toFixed(11));
            $("#a_sec").html(s_secNew);
        }

// Калькулятор для расчета площади эллипса

        var trap_var = "";
        var trap_val1 = "";
        var trap_val2 = "";
        var trap_val3 = "";
        var trap_units1 = "";
        var trap_units2 = "";
        var trap_units3 = "";
        var trap_units4 = "";
        var trap_units5 = "";
        var s_trap_metr = "";
        var s_trap = "";
        var s_trapNew = "";

        function change_variant_trapeze() {

            trap_var = $("#trap_var").val();

            switch (trap_var) {
                case "var1":
                    $("#trap_pic").attr("src", "/images/math/area_trapeze1.png");
                    $("#trap_name3").html("h=");


                    $("#div_trap5").css("display", "none");
                    $("#div_trap6").css("display", "none");
                    $("#div_trap7").css("display", "none");
                    $("#btn_trap").css("left", "-156px");


                    $("#div_answer_trap").css("display", "none");


                    break;
                case "var2":
                    $("#trap_pic").attr("src", "/images/math/area_trapeze2.png");
                    $("#trap_name3").html("c=");

                    $("#div_trap5").css("display", "block");
                    $("#div_trap6").css("display", "block");
                    $("#div_trap7").css("display", "block");


                    $("#btn_trap").css("left", "0px");
                    $("#div_answer_trap").css("display", "none");
                    break;

            }
        }


        function calculate_s_trapeze() {
            trap_var = $("#trap_var").val();


            if (trap_var == "var1" || trap_var == "var2") {
                trap_val1 = $("#trap_val1").val();
                trap_val2 = $("#trap_val2").val();
                trap_val3 = $("#trap_val3").val();
                trap_units1 = $("#trap_units1").val();
                trap_units2 = $("#trap_units2").val();
                trap_units3 = $("#trap_units3").val();


                trap_val1 = trap_val1.replace(",", ".");
                trap_val2 = trap_val2.replace(",", ".");
                trap_val3 = trap_val3.replace(",", ".");

                if (trap_val1 == "" || trap_val2 == "" || trap_val3 == "") {
                    alert("Поля, соответствующие значениям основаниям и высоты трапеции, должны быть заполнены!");
                }
                else {
                    switch (trap_units1) {
                        case "mm":
                            trap_val1 = parseFloat(trap_val1) * 0.001;
                            s = 0.001;
                            break;
                        case "cm":
                            trap_val1 = parseFloat(trap_val1) * 0.01;
                            s = 0.01;
                            break;
                        case "m":
                            trap_val1 = parseFloat(trap_val1) * 1;
                            s = 1;
                            break;
                        case "km":
                            trap_val1 = parseFloat(trap_val1) * 1000;
                            s = 1000;
                            break;
                        case "f":
                            trap_val1 = parseFloat(trap_val1) * 0.3048;
                            s = 0.3048;
                            break;
                        case "ya":
                            trap_val1 = parseFloat(trap_val1) * 0.9144;
                            s = 0.9144;
                            break;
                        case "d":
                            trap_val1 = parseFloat(trap_val1) * 0.0254;
                            s = 0.0254;
                            break;
                        case "ml":
                            trap_val1 = parseFloat(trap_val1) * 1609.344;
                            s = 1609.344;
                            break;
                    }
                    switch (trap_units2) {
                        case "mm":
                            trap_val2 = parseFloat(trap_val2) * 0.001;
                            break;
                        case "cm":
                            trap_val2 = parseFloat(trap_val2) * 0.01;
                            break;
                        case "m":
                            trap_val2 = parseFloat(trap_val2) * 1;
                            break;
                        case "km":
                            trap_val2 = parseFloat(trap_val2) * 1000;
                            break;
                        case "f":
                            trap_val2 = parseFloat(trap_val2) * 0.3048;
                            break;
                        case "ya":
                            trap_val2 = parseFloat(trap_val2) * 0.9144;
                            break;
                        case "d":
                            trap_val2 = parseFloat(trap_val2) * 0.0254;
                            break;
                        case "ml":
                            trap_val2 = parseFloat(trap_val2) * 1609.344;
                            break;
                    }

                    switch (trap_units3) {
                        case "mm":
                            trap_val3 = parseFloat(trap_val3) * 0.001;
                            break;
                        case "cm":
                            trap_val3 = parseFloat(trap_val3) * 0.01;
                            break;
                        case "m":
                            trap_val3 = parseFloat(trap_val3) * 1;
                            break;
                        case "km":
                            trap_val3 = parseFloat(trap_val3) * 1000;
                            break;
                        case "f":
                            trap_val3 = parseFloat(trap_val3) * 0.3048;
                            break;
                        case "ya":
                            trap_val3 = parseFloat(trap_val3) * 0.9144;
                            break;
                        case "d":
                            trap_val3 = parseFloat(trap_val3) * 0.0254;
                            break;
                        case "ml":
                            trap_val3 = parseFloat(trap_val3) * 1609.344;
                            break;
                    }

                    if (trap_var == "var1") {
                        s_trap_metr = (parseFloat(trap_val1) + parseFloat(trap_val2)) * parseFloat(trap_val3) * 0.5;
                    }

                    if (trap_var == "var2") {
                        switch (trap_units4) {
                            case "mm":
                                trap_val4 = parseFloat(trap_val4) * 0.001;
                                break;
                            case "cm":
                                trap_val4 = parseFloat(trap_val4) * 0.01;
                                break;
                            case "m":
                                trap_val4 = parseFloat(trap_val4) * 1;
                                break;
                            case "km":
                                trap_val4 = parseFloat(trap_val4) * 1000;
                                break;
                            case "f":
                                trap_val4 = parseFloat(trap_val4) * 0.3048;
                                break;
                            case "ya":
                                trap_val4 = parseFloat(trap_val4) * 0.9144;
                                break;
                            case "d":
                                trap_val4 = parseFloat(trap_val4) * 0.0254;
                                break;
                            case "ml":
                                trap_val4 = parseFloat(trap_val4) * 1609.344;
                                break;
                        }
                        bb = ((trap_val2 - trap_val1) * (trap_val2 - trap_val1) + trap_val3 * trap_val3 - trap_val4 * trap_val4) / (2 * (trap_val2 - trap_val1));
                        s_trap_metr = (parseFloat(trap_val1) + parseFloat(trap_val2)) * 0.5 * Math.sqrt(trap_val3 * trap_val3 - (bb * bb));
                    }

                    s_trap = s_trap_metr / (s * s);
                    s_trap = Number(s_trap.toFixed(12));


                    $("#a_trap").html(s_trap);
                    $("#div_answer_trap").css("display", "block");
                    $("#trap_units5").val(trap_units1);
                }

            }


        }


        function calculate_result_trap() {

            s_trapNew = "";
            trap_units5 = $("#trap_units5").val();

            switch (trap_units5) {
                case "mm":
                    s_trapNew = s_trap_metr / (0.001 * 0.001);
                    break;
                case "cm":
                    s_trapNew = s_trap_metr / (0.01 * 0.01);
                    break;
                case "m":
                    s_trapNew = s_trap_metr / 1;
                    break;
                case "km":
                    s_trapNew = s_trap_metr / (1000 * 1000);
                    break;
                case "f":
                    s_trapNew = s_trap_metr / (0.3048 * 0.3048);
                    break;
                case "ya":
                    s_trapNew = s_trap_metr / (0.9144 * 0.9144);
                    break;
                case "d":
                    s_trapNew = s_trap_metr / (0.0254 * 0.0254);
                    break;
                case "ml":
                    s_trapNew = s_trap_metr / (1609.344 * 1609.344);
                    break;
            }
            s_trapNew = Number(s_trapNew.toFixed(11));
            $("#a_trap").html(s_trapNew);
        }

        $(window).resize(function () {
            check_width_conent();
        });

        check_width_conent();

    });

</script>
@endpush