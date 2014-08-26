@include('layouts.partials.errors')

<div class="status-post">
    {{ Form::open(['route' => 'statuses_path']) }}
    <div class="form-group">
        {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => Lang::get('status.What is happening')]) }}
    </div>

    <div class="form-group status-post-submit">
        {{ Form::submit(Lang::get('status.Send'), ['class' => 'btn btn-default btn-xs']) }}
    </div>
    {{ Form::close() }}
</div>