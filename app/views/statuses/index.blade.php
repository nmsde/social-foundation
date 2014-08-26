@extends('layouts.default')


@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {{ Lang::get('default.Welcome Back') }}

        @include('statuses.partials.form')


        @include('statuses.partials.statuses')

        {{ $statuses->links() }}


    </div>
</div>

@stop