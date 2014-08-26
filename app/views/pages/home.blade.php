@extends('layouts.default')

@section('content')

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>{{ Lang::get('default.Welcome To') . ' ' . Lang::get('default.Sitename') }}</h1>
        <p>Lite dummytext.</p>

        @if (! $currentUser )
        <p>
            {{ link_to_route('register_path', Lang::get('account.Register'), null, ['class' => 'btn btn-lg btn-primary']) }}
        </p>
        @endif
    </div>

@stop