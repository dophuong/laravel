@extends('admin.layouts.app')
@section('title', 'Admin management')

@section('content')
    <div class="row">
        <div class="col-sm-2 col-md-3">
            <h4><a href="{{ route('admin') }}">Home</a></h4>
            <h4><a href="{{ route('getAddPost') }}">Add post</a></h4>
        </div>
        <div class="col-sm-9 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Posts management</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <td>Id</td>
                            <td>Title</td>
                            <td>Authour</td>
                            <td>Is Private</td>
                            </thead>
                            @foreach($post as $p)
                                <tbody>
                                <tr>
                                    <td><?=$p->id?></td>
                                    <td><?=$p->title?></td>
                                    <td><?=$p->user->name?></td>
                                    <td><?=$p->isPrivate?></td>
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