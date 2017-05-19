@extends('admin.layouts.app')
@section('title', 'Admin management')

@section('content')
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <h4><a href="{{ route('admin') }}">Home</a></h4>
            <h4><a href="{{ route('getAddUser') }}">Add user</a></h4>
        </div>
        <div class="col-sm-8 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Users management</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                @foreach($user as $usr)
                                    <tr>
                                        <td>
                                            <h4><a href="{{ route('getUserProfile', $usr->id) }}"><?=$usr->name?></a></h4>
                                        </td>
                                        <td>
                                            <a class="btn-link" href="{{ route('getEditUser',$usr->id )}}">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('deleteUser', $usr->id) }}" class="btn-link" onclick="return confirm('Are you sure ?') ">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection