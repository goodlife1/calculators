<!DOCTYPE html>
<html lang="{{ @app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@stack('title'){{@$page->title}}</title>
    <meta name="description" content="{{@$page->description}}">
    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('public/images/log.png')}}" type="image/x-icon">
    <!-- Latest compiled and minified JavaScript -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('style')

</head>
<body>
{{--Navbar--}}
<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
    <div class="[ container ]">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="[ navbar-header ]">
            <button type="button" class="[ navbar-toggle ]" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="[ sr-only ]">Toggle navigation</span>
                <span class="[ icon-bar ]"></span>
                <span class="[ icon-bar ]"></span>
                <span class="[ icon-bar ]"></span>
            </button>
            <div class="[ animbrand ]" >
                <a class="[ navbar-brand ][ animate ]" href="{{route('home')}}" style="padding: 0"><img height="50" src="{{asset('public/images/logo.png')}}"></a>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="[ collapse navbar-collapse ]" id="bs-example-navbar-collapse-1">
            <ul class="[ nav navbar-nav navbar-right ]">
                <li class="[ visible-xs ]">
                    <form action="http://bootsnipp.com/search" method="GET" role="search">
                        <div class="[ input-group ]">
                            <input type="text" class="[ form-control ]" name="q" placeholder="Search for snippets">
                            <span class="[ input-group-btn ]">
									<button class="[ btn btn-primary ]" type="submit"><span
                                                class="[ glyphicon glyphicon-search ]"></span></button>
									<button class="[ btn btn-danger ]" type="reset"><span
                                                class="[ glyphicon glyphicon-remove ]"></span></button>
								</span>
                        </div>
                    </form>
                </li>
                @foreach($cati as $item)
                    <li>
                        <a href="#" class="[ dropdown-toggle ][ animate ]" data-toggle="dropdown">{{$item->name}}<span
                                    class="[ caret ]"></span></a>
                        <ul class="[ dropdown-menu ]" role="menu">
                            @foreach($item->page() as $page)
                            <li><a href="{{route('page',['page'=>$page->slug])}}" class="[ animate ]">{{$page->name}} </a></li>
                          @endforeach
                                {{--<li><a href="#" class="[ animate ]">Health <span--}}
                                {{--class="[ pull-right glyphicon glyphicon-align-justify ]"></span></a></li>--}}

                                {{--<li><a href="#" class="[ animate ]">Download Bootstrap <span--}}
                                {{--class="[ pull-right glyphicon glyphicon-cloud-download ]"></span></a></li>--}}
                                {{--<li class="[ dropdown-header ]">Bootstrap Templates</li>--}}
                                {{--<li><a href="#" class="[ animate ]">Browse Templates <span--}}
                                {{--class="[ pull-right glyphicon glyphicon-shopping-cart ]"></span></a></li>--}}
                                {{--<li class="[ dropdown-header ]">Builders</li>--}}
                                {{--<li><a href="#" class="[ animate ]">Form Builder <span--}}
                                {{--class="[ pull-right glyphicon glyphicon-tasks ]"></span></a></li>--}}
                                {{--<li><a href="#" class="[ animate ]">Button Builder <span--}}
                                {{--class="[ pull-right glyphicon glyphicon-edit ]"></span></a></li>--}}
                        </ul>
                    </li>
                @endforeach
                {{--<li>--}}
                    {{--<a href="#" class="[ dropdown-toggle ][ animate ]" data-toggle="dropdown">Mathematic <span--}}
                                {{--class="[ caret ]"></span></a>--}}
                    {{--<ul class="[ dropdown-menu ]" role="menu">--}}
                        {{--<li><a href="#" class="[ animate ]">Mathematic </a></li>--}}

                        {{--<li><a href="#" class="[ animate ]">Health <span--}}
                        {{--class="[ pull-right glyphicon glyphicon-align-justify ]"></span></a></li>--}}
                        {{--<li><a href="#" class="[ animate ]">Download Bootstrap <span--}}
                        {{--class="[ pull-right glyphicon glyphicon-cloud-download ]"></span></a></li>--}}
                        {{--<li class="[ dropdown-header ]">Bootstrap Templates</li>--}}
                        {{--<li><a href="#" class="[ animate ]">Browse Templates <span--}}
                        {{--class="[ pull-right glyphicon glyphicon-shopping-cart ]"></span></a></li>--}}
                        {{--<li class="[ dropdown-header ]">Builders</li>--}}
                        {{--<li><a href="#" class="[ animate ]">Form Builder <span--}}
                        {{--class="[ pull-right glyphicon glyphicon-tasks ]"></span></a></li>--}}
                        {{--<li><a href="#" class="[ animate ]">Button Builder <span--}}
                        {{--class="[ pull-right glyphicon glyphicon-edit ]"></span></a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="[ dropdown ]">--}}
                    {{--<a href="#" class="[ dropdown-toggle ][ animate ]" data-toggle="dropdown">Snippets <span--}}
                                {{--class="[ caret ]"></span></a>--}}
                    {{--<ul class="[ dropdown-menu ]" role="menu">--}}
                        {{--<li><a href="#" class="[ animate ]">Featured <span--}}
                                        {{--class="[ pull-right glyphicon glyphicon-star ]"></span></a></li>--}}
                        {{--<li><a href="#" class="[ animate ]">Tags <span--}}
                                        {{--class="[ pull-right glyphicon glyphicon-tags ]"></span></a></li>--}}
                        {{--<li class="[ dropdown-header ]">By Bootstrap Version</li>--}}
                        {{--<li><a href="#" class="[ animate ]">3.2.0</a></li>--}}
                        {{--<li><a href="#" class="[ animate ]">3.1.0</a></li>--}}
                        {{--<li><a href="#" class="[ animate ]">3.0.3</a></li>--}}
                        {{--<li><a href="#" class="[ animate ]">3.0.1</a></li>--}}
                        {{--<li><a href="#" class="[ animate ]">3.0.0</a></li>--}}
                        {{--<li><a href="#" class="[ animate ]">2.3.2</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li><a class="animate" href="#register">Register</a></li>--}}
                {{--<li><a class="animate" href="#login">Login</a></li>--}}
                <li class="[ hidden-xs ]"><a href="#toggle-search" class="[ animate ]"><span
                                class="[ glyphicon glyphicon-search ]"></span></a></li>
                <div style="margin-top: 5px" class="btn-group">
                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">{{strtoupper(App::getLocale())}} <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><a href="/lang/en">EN</a>
                        </li>
                        <li><a href="/lang/ru">RU</a>
                        </li>

                    </ul>
                </div>
                <div id="Menu"></div>
            </ul>
        </div>
    </div>
    <div class="[ bootsnipp-search animate ]">
        <div class="[ container ]">
            <form action="{{route('search')}}" method="GET" role="search">
                <div class="[ input-group ]">
                    <input type="text" class="[ form-control ]" name="q"
                           placeholder="Search ...">
                    <span class="[ input-group-btn ]">
							<button class="[ btn btn-danger ]" type="reset"><span
                                        class="[ glyphicon glyphicon-remove ]"></span></button>
						</span>
                </div>
            </form>
        </div>
    </div>
</nav>
<div style="display: block;width: 100%;margin-top: 80px"></div>
{{--End Navbar--}}
@yield('content')
<style>
    footer{
        min-height:50px;
    }
    footer ul{
        width: 20%;
    }
    footer  li{
        margin-top: 15px;
        float: left;
        list-style: none;
        color: white;
        margin-right: 15px;
    }
</style>
<footer style="background-color: black; margin-top: 50px">
    <div class="container-fluid" style="display: flex;justify-content: center;justify-items:center;flex-wrap: wrap">

        {{--<li>About Us</li>--}}
        <li><a href="{{route('contact')}}" style="text-decoration: none;color: white;min-width: 100px">Contact us</a></li>

    </div>
</footer>
<!-- Scripts -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('script')


</body>
</html>
