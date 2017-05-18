@extends('front.layouts.app')
@section('title','Edit Post')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit post</div>
                    <div class="panel-body">
                        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ route('userEditPost',$post->id) }}">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="<?=$post->title?>" required>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <input id="userId" name="userId" value="<?=$post->userId?>" type="hidden">
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content" class="col-md-4 control-label">Content</label>
                                <div class="col-md-6">
                                    <textarea id="content" class="form-control" name="content" required><?=$post->content?></textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image" class="col-md-4 control-label">Image</label>
                                <div class="col-md-6">
                                    <input type="file" name="image" multiple />
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('isPrivate') ? ' has-error' : '' }}">
                                <label for="isPrivate" class="col-md-4 control-label">Is Private</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="isPrivate" name="isPrivate">
                                        @if($post->isPrivate == 1)
                                            <option value="1" selected="selected">Private</option>
                                            <option value="0">Public</option>
                                        @elseif($post->isPrivate == 0)
                                            <option value="1">Private</option>
                                            <option value="0" selected="selected">Public</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('isPrivate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('isPrivate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a class="btn btn-close btn-primary" href="{{route('userPost')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
