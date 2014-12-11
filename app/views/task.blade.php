@extends('_master')

@section('title')
Task Form
@stop

@section('content')
<h2>Show task info</h2>
{{ Pre::render($tasklist) }};
<h2><a href="/task_create">Edit Task link</a></h2>

@stop