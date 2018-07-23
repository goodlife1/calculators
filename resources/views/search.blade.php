@extends('layouts.app')
@push('style')
<style>
    .panel-heading a:hover{
        color: whitesmoke;
    }
    .panel-heading a{
        text-decoration: none;
        color: white;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="col-xs-12 col-md-9">
            @forelse($pages as $page)
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><a href="{{route('page',['page'=>$page->slug])}}">{{$page->name}}</a></div>
                    <div class="panel-body">{{$page->description}}</div>
                </div>
            </div>
        @empty
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Empty</div>
                    </div>
                </div>
                @endforelse
        </div>
        @include('baners.right_banner')
    </div>
    @endsection