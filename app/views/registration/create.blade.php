@extends('layouts.default')

@section('content')
    <div class="row">
    <div class="col-md-6">
        <h1>Registration</h1>

        @include('layouts.partials.errors')

        {{ Form::open() }}

            <div class="form-group">
                {{ Form::label('username', Lang::get('account.Username').':') }}
                {{ Form::text('username', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', Lang::get('account.Email').':') }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
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
                {{ Form::submit(Lang::get('account.Create Account'), ['class' => 'btn btn-primary']) }}
            </div>

        {{ Form::close() }}

    </div>
</div>
@stop