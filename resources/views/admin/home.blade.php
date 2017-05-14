@extends('admin.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-2">
                </div>
                @if(!Auth::check())
                    <div class="col-md-8">
                        <div class="quote">This is my home page !</div>
                    </div>
                @else
                    <div class="col-md-8">
                        <h4><a href="{{ route('getListUser') }}">Admin management</a></h4>

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection