@extends('front.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="row" style="background-color: #f9fbf8">
        <div class="col-xs-12 col-sm-10 col-md-9" style="padding: 30px">
            @foreach($post as $p)
                <div class=" col-xs-3 col-sm-3 col-md-3">
                    <img src="\images\<?=$p->image?>" class="img-thumbnail" style="max-width: 140px"/>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <h4><a href="{{ route('userViewPost',$p->id) }}"><?=$p->title?></a></h4>
                    <p><?= str_limit($p->content, 200);?></p>
                    <div class="pa">
                        <p align="right">Author :  <?=$p->user->name?></p>
                        <p align="right">Created at :  <?=$p->created_at?></p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
            @endforeach
            {{$post->links()}}
        </div>
        <div class="col-md-1"></div>
        <div class="col-xs-12 col-md-2 col-sm-2">
            <nav class="nav-sidebar">
                <ul class="nav tabs">
                    <li><h3><a href="{{ route('userGetAddPost') }}">Add Post</a></h3></li>
                    <li><h3>List user</h3></li>
                    @foreach($user as $usr)
                        <li><h4><a href="{{ route('userListPost',$usr->id) }}"><?=$usr->name?></a></h4></li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
@endsection