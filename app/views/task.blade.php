@extends('_master')

@section('title')
Task Form
@stop

@section('content')
<h2>Show task info</h2>
{{ $task->shortDesc }}<br>
{{ $task->longDesc }}<br>
{{ $task->priority }}<br>
<h2><a href = "/task/udpate/{{$task->id}}">Edit Task</a> Link</h2>
<h2>Complete Task Functionality</h2>
@stop