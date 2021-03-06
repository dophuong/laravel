@extends('admin.layouts.app')
@section('title', 'Home')

@section('content')
<div class="row">
    {{--<div class="columns">--}}
        @if(!Auth::check())
            <div class="col col-sm-2 col-md-2">
                <h4><a href="{{ route('getAddPost') }}">Add Post</a></h4>
            </div>
        @else
            <div class="col-sm-2 col-md-2">
                <h4><a href="{{ route('getAddPost') }}">Add Post</a></h4>
                <h4><a href="{{ route('getListUser') }}">Users management</a></h4>
                <h4><a href="{{ route('getListPost') }}">Posts management</a></h4>
            </div>
        @endif
        <div class="col-sm-1 col-md-1"></div>
        <div class="col-sm-9 col-md-9">
            @foreach($post as $p)
                <div class="post-item">
                    <div class="col-sm-4 col-md-3">
                        <img src="\images\<?=$p->image?>" class="img-thumbnail" style="max-width: 137px"/>
                    </div>
                    <div class="col-sm-8 col-md-9">
                        <h4><?=$p->title?></h4>
                        <p><?= str_limit($p->content, 200);?></p>
                        <div class="pa">
                            <p align="right">Author :  <?=$p->user->name?></p>
                            <p align="right">Created at :  <?=$p->created_at?></p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            @endforeach
            {{$post->links()}}
        </div>
    {{--</div>--}}
</div>
@endsection