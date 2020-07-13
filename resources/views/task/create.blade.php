@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">{{ __('tasks.create_tasks_title') }}</h1>
        {{ Form::model($task, ['url' => route('tasks.store')]) }}
            @include('task.form')
            {{ Form::submit(__('tasks.create'), ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>
@endsection
