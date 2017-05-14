@extends('admin.layouts.app')
@section('title', 'Admin management')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    <h4><a href="{{ route('getAddUser') }}">Add user</a></h4>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">Users management</div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    @foreach($user as $usr)
                                        <tr>
                                            <td>
                                                <h4><a href="{{ route('getUserProfile', $usr->id) }}"><?=$usr->name?></a></h4>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('getEditUser',$usr->id )}}">Edit</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('deleteUser', $usr->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure ?') ">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection