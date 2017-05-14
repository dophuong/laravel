@extends('admin.layouts.app')
@section('title','Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h4>Relate</h4>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>User profile</h4></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Id</th>
                                    <td><?=$user->id?></td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td><?=$user->name?></td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td><?=$user->role?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?=$user->email?></td>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td><?=$user->password?></td>
                                </tr>
                                <tr>
                                    <th>Create time</th>
                                    <td><?=$user->created_at?></td>
                                </tr>
                                <tr>
                                    <th>Update_time</th>
                                    <td><?=$user->updated_at?></td>
                                </tr>
                            </table>
                        </div>
                        <a href="{{ route('getEditUser', Auth::user()->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('deleteUser', Auth::user()->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure ?') ">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection