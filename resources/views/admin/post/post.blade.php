@extends('admin.layouts.app')
@section('title', 'Admin management')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    <h4><a href="{{ route('admin') }}">Home</a></h4>
                    <h4><a href="{{ route('getAddPost') }}">Add post</a></h4>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">Posts management</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <td>Id</td>
                                <td>Title</td>
                                <td>Authour</td>
                                </thead>
                                @foreach($post as $p)
                                    <tbody>
                                    <tr>
                                        <td><?=$p->id?></td>
                                        <td><?=$p->title?></td>
                                        <td><?=$p->user->name?></td>
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
    </div>
@endsection