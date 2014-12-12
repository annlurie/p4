@extends('_master')

@section('title')
Task Form
@stop

@section('content')
<h1>Task Update Page</h1>
{{ $task->shortDesc }}<br>
{{ $task->longDesc }}<br>
{{ $task->priority }}<br>
@stop