@extends('layouts.default')

@section('content')

    <h1>{{ Lang::get('account.Login') }}</h1>

    <div class="row">
        <div class="col-md-6">

        {{ Form::open(['route' => 'login_path']) }}

            <div class="form-group">
                {{ Form::label('email', Lang::get('account.Email').':') }}
                {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', Lang::get('account.Password').':') }}
                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
            </div>

            <div class="form-group">
                {{ Form::submit(Lang::get('account.Login'), ['class' => 'btn btn-primary', 'id' => 'login-btn']) }}
                {{ link_to('password/remind', Lang::get('account.Forgot Password')) }}
            </div>

        {{ Form::close() }}

        </div>
    </div>


@stop