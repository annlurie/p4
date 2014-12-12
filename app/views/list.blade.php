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
    <li><a href="/task/{{$task->id}}">{{ $task->shortDesc }}</a></li>
@endforeach
<h2><a href="/task_create">Add A Task To This List</a></h2>
<h2>See Completed Tasks</h2>
<h2>See All Tasks</h2>

@stop