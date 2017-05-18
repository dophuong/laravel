@extends('front.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-2">
                    <h4><a href="{{ route('userGetAddPost') }}">Add Post</a></h4>
                    @foreach($user as $usr)
                        <h4><a href="{{ route('userListPost',$usr->id) }}"><?=$usr->name?></a></h4>
                    @endforeach
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    @foreach($post as $p)
                        <div class="post-item">
                            <div class="col-md-3">
                                <img src="\images\<?=$p->image?>" class="img-thumbnail"/>
                            </div>
                            <div class="col-md-9">
                                <h4><a href="{{ route('userViewPost',$p->id) }}"><?=$p->title?></a></h4>
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
            </div>
        </div>
    </div>
@endsection