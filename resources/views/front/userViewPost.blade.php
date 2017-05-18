@extends('front.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-2">
                    <h4><a href="{{ route('userGetAddPost') }}">Add Post</a></h4>
                    @foreach($allPost as $pst)
                        <h4><a href="{{ route('userViewPost',$pst->id) }}"><?=$pst->title?></a></h4>
                    @endforeach
                </div>
                        <div class="col-md-8">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <img src="\images\<?=$post->image?>" class="img-thumbnail"/>
                                    <div class="pa">
                                        <p align="right">Author :  <?=$post->user->name?></p>
                                        <p align="right">Created at :  <?=$post->created_at?></p>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <h4><?=$post->title?></h4>
                                    <p>{{$post->content}}</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <hr>
                                    <input id="user" value="{{Auth::user()->name}}" type="hidden">
                                    <input class="comment btn-link" onclick="replyComment(this, 0)" value="Comment"/>
                                    <div id="divComment" class="comment"></div>
                                    <form id="commentForm"  class="form-horizontal" method="post" style="display: none">
                                        <fieldset>
                                            <legend><h4>{{Auth::user()->name}}</h4></legend>
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
                <div class="col-md-2">
                    @foreach($user as $usr)
                        <h4><a href="{{ route('userListPost',$usr->id) }}"><?=$usr->name?></a></h4>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection