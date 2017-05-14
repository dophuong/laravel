@extends('admin.layouts.app')
@section('title', 'Edit Profile')

@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Edit user</div>
                <div class="panel-body">
                    {!! Form::model($user, ['action' => ['Admin\UsersController@update', 'id' => $user->id], 'method' => 'PUT']) !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', $user->name, [
                            'class' => 'form-control'
                        ]) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'E-mail') !!}
                        {!! Form::text('email', $user->email, [
                            'class' => 'form-control'
                        ]) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('pasword') ? ' has-error' : '' }}">
                        {!! Form::label('password', 'New password') !!}
                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter your new password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            @if($user->role == 1)
                                <option value="1" selected="selected">1</option>
                                <option value="2">2</option>
                            @elseif($user->role == 2)
                                <option value="1">1</option>
                                <option value="2" selected="selected">2</option>
                            @endif
                        </select>
                            {{--{!! Form::select('role', [null,$user->role, 2], $user->role, [--}}
                                {{--'class' => 'form-control'--}}
                            {{--]) !!}--}}
                            {{--{!! Form::select('role', [null,1, $user->role], $user->role, [--}}
                                   {{--'class' => 'form-control'--}}
                            {{--]) !!}--}}
                        {{----}}
                        @if ($errors->has('role'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a class="btn btn-close btn-primary" href="{{ route('getUserProfile', $user->id) }}">Cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection()

