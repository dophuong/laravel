@extends('front.layouts.app')
@section('title', 'Edit Profile')

@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
                    {!! Form::model($user, ['action' => ['FrontEnd\PagesController@updateProfile', 'id' => $user->id], 'method' => 'post']) !!}
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
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        {!! Form::label('password', 'New password') !!}
                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter your new password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <input name="role" value=2 type="hidden">
                    {{--<div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">--}}
                        {{--<label for="password-confirm" class="control-label">Confirm Password</label>--}}
                            {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                        {{--@if ($errors->has('password-confirm'))--}}
                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a class="btn btn-close btn-primary" href="{{ route('userProfile') }}">Cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection()

