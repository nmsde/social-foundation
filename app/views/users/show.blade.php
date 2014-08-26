@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
                    @include('users.partials.avatar', ['size' => 50])
                </div>

                <div class="media-body">
                    <h1 class="media-heading">{{ $user->username }}</h1>

                    <ul class="list-inline text-muted">
                        <li>{{ Lang::get('account.Statuses') }}: {{ $user->present()->statusCount() }}</li>
                        <li>{{ Lang::get('account.Following') }}: {{ $user->present()->followingCount() }}</li>
                        <li>{{ Lang::get('account.Followers') }}: {{ $user->present()->followersCount() }}</li>
                    </ul>

                    @unless($user->is($currentUser))
                        @include('users.partials.follow-form')
                    @endif
                </div>

                @foreach ($user->followers as $follower)
                    @include('users.partials.avatar', ['size' => 25, 'user' => $follower])
                @endforeach
            </div>
        </div>

        <div class="col-md-6">
            @if ($user->is($currentUser))
                @include('statuses.partials.form')
            @endif

            @include('statuses.partials.statuses', ['statuses' => $user->statuses])
        </div>

    </div>

@stop