@extends('_master')

@section('title')
Task
@stop

@section('content')
<h1>Create a New List</h1>
{{ Form::open(array('url' => '/list_create')) }}
{{ Form::label('title', 'Title') }} <p>
{{ Form::text('title', '') }} <p>
{{ Form::label('desc', 'Description') }} <p>
{{ Form::textarea('desc', '') }} <p>
{{ Form::submit('Save') }}
{{ Form::close() }}
@stop

{{--
@section('content')
<h2>Show task info</h2>
{{ $task->shortDesc }}<br>
{{ $task->longDesc }}<br>
{{ $task->priority }}<br>
<h2>Edit Task Link</h2>
<h2>Back to task list {{$task->tasklist_id}}: <a href="/list/{{$task->tasklist_id}}">Task List</a></h2>
@if (isset($tasklist))
{{Pre::render($tasklist)}}
@endif
@stop
--}}