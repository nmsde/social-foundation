@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>{{ Lang::get('account.Reset Your Password') }}</h1>

        {{ Form::open() }}

            {{ Form::hidden('token', $token) }}

                <div class="form-group">
                    {{ Form::label('email', Lang::get('account.Email').':') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
                 </div>
                <div class="form-group">
                    {{ Form::label('password', Lang::get('account.Password').':') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', Lang::get('account.Password Confirmation').':') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit(Lang::get('account.Reset Password'), ['class' => 'btn btn-primary form-control']) }}
                </div>


        {{ Form::close() }}

    </div>
</div>

@stop