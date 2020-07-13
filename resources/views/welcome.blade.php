@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">{{ __('tasks.main_title') }}</h1>
        <p class="lead">{{ __('tasks.main_subtitle') }}</p>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="{{route('tasks.index')}}" role="button">{{ __('tasks.main_button') }}</a>
    </div>
@endsection
