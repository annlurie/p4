@extends('_master')

@section('title')
Task Form
@stop

@section('content')
<h2>Show task info</h2>
{{ $task->shortDesc }}<br>
{{ $task->longDesc }}<br>
{{ $task->priority }}<br>
<h2>Edit Task Link</h2>
<h2>Complete Task Functionality</h2>
@stop