@extends('front.layouts.app')
@section('title', 'User Post')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <h4><a href="{{ url('/') }}">Home</a></h4>
            <h4><a href="{{ route('userGetAddPost') }}">Add post</a></h4>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Posts management</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <td>Title</td>
                            <td>Authour</td>
                            <td>Is Private</td>
                            </thead>
                            @foreach($post as $p)
                                <tbody>
                                <tr>
                                    <td><?=$p->title?></td>
                                    <td><?=$p->user->name?></td>
                                    @if($p->isPrivate == 0)
                                        <td>Public</td>
                                    @else
                                        <td>Private</td>
                                    @endif
                                    <td><a href="{{route('userGetEditPost', $p->id)}}">Edit</a></td>
                                    <td><a href="{{route('userDeletePost', $p->id)}}" onclick="return confirm('Are you sure ?') ">Delete</a></td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        {{$post->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection