@extends('layouts.app')
@push('style')
<style>
    @import url("http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700");
    @import url("http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600|Roboto Mono");
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");

    @font-face {
        font-family: 'Dosis';
        font-style: normal;
        font-weight: 300;
        src: local('Dosis Light'), local('Dosis-Light'), url(http://fonts.gstatic.com/l/font?kit=RoNoOKoxvxVq4Mi9I4xIReCW9eLPAnScftSvRB4WBxg&skey=a88ea9d907460694) format('woff2');
    }

    @font-face {
        font-family: 'Dosis';
        font-style: normal;
        font-weight: 500;
        src: local('Dosis Medium'), local('Dosis-Medium'), url(http://fonts.gstatic.com/l/font?kit=Z1ETVwepOmEGkbaFPefd_-CW9eLPAnScftSvRB4WBxg&skey=21884fc543bb1165) format('woff2');
    }

    body {

        font-family: 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif, Open Sans;
        font-size: 14px;
        line-height: 1.42857;
        height: 350px;
        padding: 0;
        margin: 0;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="col-xs-12 col-md-9">
            <div class="row">
                <div class="col-md-2"> </div>
                <div class="col-md-8">
                   @lang('global.contact_us')
                    <!-- BEGIN DOWNLOAD PANEL -->
                    <div class="panel panel-default well">
                        <div class="panel-body">
                            <form action="{{route('send_mail')}}" class="form-horizontal track-event-form bv-form"
                                  data-goaltype="”General”" data-formname="”ContactUs”" method="post"
                                  id="contact-us-all" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" id="exampleInputFirstName"
                                                   placeholder="Enter first name" name="C_FirstName"
                                                   data-bv-field="C_FirstName">
                                        </div>
                                        <small data-bv-validator="notEmpty" data-bv-validator-for="C_FirstName"
                                               class="help-block" style="display: none;">Required
                                        </small>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" id="exampleInputLastName"
                                                   placeholder="Enter last name" name="C_LastName"
                                                   data-bv-field="C_LastName"></div>
                                        <small data-bv-validator="notEmpty" data-bv-validator-for="C_LastName"
                                               class="help-block" style="display: none;">Required
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                   placeholder="Enter email" name="C_EmailAddress"
                                                   data-bv-field="C_EmailAddress">
                                        </div>
                                        <small data-bv-validator="notEmpty" data-bv-validator-for="C_EmailAddress"
                                               class="help-block" style="display: none;">Required
                                        </small>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-comment fa-2"></i>
                                            </div>
                                            <textarea class="form-control" name="Comments" id="Comments" rows="5"
                                                      style="width:99.9%"
                                                      placeholder="Enter your message here"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button id="contacts-submit" type="submit" class="btn btn-default btn-info">
                                            CONTACT US
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" value=""></form>
                        </div><!-- end panel-body -->
                    </div><!-- end panel -->
                    <!-- END DOWNLOAD PANEL -->
                </div><!-- end col-md-8 -->
                <div class="col-md-2"> </div>
            </div>
        </div>
        @include('baners.right_banner')
    </div>
@endsection