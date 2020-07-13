@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif
<div class="form-group">
    {{ Form::label('name', __('tasks.name')) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

