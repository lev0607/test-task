@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">{{ __('tasks.edit_tasks_title') }}</h1>
        {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH']) }}
            @include('task.form')
            {{ Form::submit(__('tasks.update'), ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>
@endsection
