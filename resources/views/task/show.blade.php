@extends('layouts.app')

@section('task', 'active')
@section('content')
    <div class="container">
        <h1 class="mb-5">{{ __('tasks.show_tasks_title') }}: {{$task->name}}</h1>
        <table class="table table-bordered table-hover text-nowrap">
            <thead class="thead-dark">
            <tr>
                <th>{{ __('tasks.id') }}</th>
                <th>{{ __('tasks.name') }}</th>
                <th>{{ __('tasks.creator') }}</th>
                <th>{{ __('tasks.created_at') }}</th>
                <th>{{ __('tasks.actions') }}</th>
            </tr>
            </thead>
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->user->name}}</td>
                    <td>{{$task->created_at}}</td>
                    <td>
                        <a href="{{route('tasks.edit', $task)}}">{{ __('tasks.edit') }}</a>
                        <a href="{{ route('tasks.destroy', $task) }}"
                           data-method="delete"
                           rel="nofollow"
                           data-confirm="{{ __('tasks.are_you_sure') }}">{{ __('tasks.remove') }}</a>
                    </td>
                </tr>
        </table>
    </div>
@endsection
