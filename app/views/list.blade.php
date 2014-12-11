@extends('_master')

@section('title')
Task Form
@stop

@section('content')
<h2>Show list title and description</h2>
{{ $tasklist->title }}; <br>
{{ $tasklist->desc }}; <br>
<h2>Show all the tasks associated with the list</h2>
@foreach ($tasks as $task)
    <p>{{ $task->shortDesc }}</p>
@endforeach
<h2><a href="/task_create">Add A Task link</a></h2>

@stop