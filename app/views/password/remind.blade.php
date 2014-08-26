@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>{{ Lang::get('account.Need to reset your password') }}</h1>

        {{ Form::open() }}

        <div class="form-group">
            {{ Form::label('email', Lang::get('account.Email').':') }}
            {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::submit(Lang::get('account.Reset Password'), ['class' => 'btn btn-primary form-control']) }}
        </div>

        {{ Form::close() }}

    </div>
</div>

@stop