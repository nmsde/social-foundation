@forelse ($statuses as $status)
    @include('statuses.partials.status')
@empty
    <p>{{ Lang::get('status.This user has not posted any statuses yet') }}</p>
@endforelse