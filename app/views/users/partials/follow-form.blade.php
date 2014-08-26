@if ($signedIn)
    @if ($user->isFollowedBy($currentUser))
        {{ Form::open(['method' => 'DELETE', 'route' => 'unfollow_path', $user->id]) }}
        {{ Form::hidden('userIdToUnfollow', $user->id) }}
        <button type="submit" class="btn btn-danger">{{ Lang::get('default.unfollow') }}</button>
        {{ Form::close() }}
    @else
        {{ Form::open(['route' => 'follow_path']) }}
        {{ Form::hidden('userIdToFollow', $user->id) }}
        <button type="submit" class="btn btn-primary">{{ Lang::get('default.follow') }} {{ $user->username }}</button>
        {{ Form::close() }}
    @endif
@endif