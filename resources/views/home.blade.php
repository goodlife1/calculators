@extends('layouts.app')

@push('style')
<link href="{{asset('css/home.css')}}" rel="stylesheet">

@endpush

@section('content')
    <div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="{{asset('public/images/finance_slide.jpg')}}"
                     alt="Los Angeles">
                <div class="carousel-caption" style="background-color: rgba(255,255,255, 0.2);border-radius: 15px;">
                    <h3><a href="{{route('category',['category'=>'finance'])}}">Finance</a></h3>
                </div>
            </div>

            <div class="item">
                <img src="{{asset('public/images/mathematic_slide.jpg')}}"
                     alt="Los Angeles">
                <div class="carousel-caption" style="background-color: rgba(255,255,255, 0.2);border-radius: 15px;">
                    <h3><a href="{{route('category',['category'=>'math'])}}">Math</a></h3>

                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container-fluid">


        <div class="col-md-9">
            <div class="categories " style="">
                @foreach($categories as $category)
                    <div class="col-xs-12 col-md-5 col-md-offset-1 category"
                         onmouseenter="document.getElementById('garanty_{{$category->id}}').beginElement()">
                        {!!$category->image_path !!}
                        <h3><a href="{{route('category',['category'=>$category->slug])}}">{{$category->name}}</a></h3>
                        <ul style="width: 100%;">
                            @foreach($category->page() as $page_i)
                                <li><a class="list-group-item"
                                       href="{{route('page',['page'=>$page_i->slug])}}">{{$page_i->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach

            </div>
        </div>
        @include('baners.right_banner')
    </div>
@endsection
