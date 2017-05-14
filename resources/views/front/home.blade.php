@extends('admin.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                    <div class="col-md-8">
                        <div class="quote">This is my home page !</div>
                    </div>
                    <div class="col-md-2">
                    </div>
                <div class="col-md-2">
                    @foreach($user as $usr)
                        <h4><?=$usr->name?></h4>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection