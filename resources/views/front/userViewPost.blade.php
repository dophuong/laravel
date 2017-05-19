@extends('front.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8" style="background-color: #f9fbf8; padding-top: 20px">
                <div class="row form-group">
                    <div class="col-xs-5 col-sm-4 col-md-3">
                        <img src="\images\<?=$post->image?>" class="img-thumbnail" style="min-width: 137px"/>
                        <div class="pa">
                            <p align="right">Author :  <?=$post->user->name?></p>
                            <p align="right">Created at :  <?=$post->created_at?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9">
                        <h3><?=$post->title?></h3>
                        <p>{{$post->content}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-1 col-md-1"></div>
                    <div class="col-xs-12 col-sm-11 col-md-11">
                        <hr>
                        @if(Auth::guest())
                            <input id="user" value="" type="hidden">
                        @else
                            <input id="user" value="{{Auth::user()->name}}" type="hidden">
                        @endif
                            <input class="comment btn-link" onclick="replyComment(this,0, 0)" value="Comment"/>
                            <div id="divComment" class="comment"></div>
                            <form id="commentForm"  class="form-horizontal" method="post" style="display: none">
                                <fieldset>
                                    @if(Auth::guest())
                                        <legend><h4>Comment</h4></legend>
                                    @else
                                        <legend><h4>{{Auth::user()->name}}</h4></legend>
                                    @endif
                                    <input type="hidden" name="postId" id="postId" value="<?=$post->id?>"/>
                                    <input type="hidden" name="parentId" id="parentId" value='0'/>
                                    <div class="form-group">
                                        <textarea class="form-control" id="content" name="content" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                </fieldset>
                            </form>
                            {!! Html::script('js/comment.js')!!}
                    </div>
                </div>
            </div>
            <div class="col-sm-1 col-md-1"></div>
            <div class="col-sm-3 col-md-3">
                <h3><a href="{{ route('userGetAddPost') }}">Add Post</a></h3>
                <h3>Articles</h3>
                @foreach($allPost as $pst)
                    <h4><a href="{{ route('userViewPost',$pst->id) }}"><?=$pst->title?></a></h4>
                @endforeach
                <h3>Users</h3>
                @foreach($user as $usr)
                    <h4><a href="{{ route('userListPost',$usr->id) }}"><?=$usr->name?></a></h4>
                @endforeach
            </div>
        </div>
    </div>
@endsection