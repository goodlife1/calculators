@extends('layouts.app')
@push('title')
{{$main_cat->name}}
@endpush
@push('style')
<link href="{{asset('css/home.css')}}" rel="stylesheet">
<style>
    h2{
        color: white;
    }
    .title{
        color: white;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="col-md-9">
            <div class="row">
                {{--<h1 class="text-center title category">{{$main_cat->name}}</h1>--}}
                {{--<p class="text-center">description</p>--}}
            </div>
            <div class="categories col-xs-12  " style="display: flex;justify-content: center;flex-wrap: wrap">
                @foreach($category as $cat)
                    <div class="col-xs-12 col-md-5 col-md-offset-1 category">

                    <h2>{{$cat->name}}</h2>
                    <ul style="width: 100%;">
                        @foreach($cat->calculator as $item)
                            <li><a class="list-group-item" href="{{route('page',['page'=>$item->slug])}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
            </div>

                @endforeach

            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="margin-top: 20px">
                </div>
            </div>
        </div>
        @include('baners.right_banner')
    </div>


@endsection