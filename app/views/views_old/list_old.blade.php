@extends('_master')

@section('title')
List
@stop

@section('content')
<h2>{{ $tasklist->title }}</h2>
{{ $tasklist->desc }} <br>
 <a href="/list/update/{{$tasklist->id}}">Edit this list</a>. <br>

@if(isset($tasks))
<h2>All Incomplete Tasks (Edit)</h2>
	@foreach ($tasks as $task)
		@if ($task->tasklist_id == $id && $task->complete == 0)
	    	<li><a href="/task/update/{{$task->id}}">{{ $task->shortDesc }}</a></li>
	    @endif
	@endforeach

	<h2>All Incomplete Tasks (Read)</h2>
	@foreach ($tasks as $task)
		@if ($task->tasklist_id == $id && $task->complete == 0)
	    	<li>
	    		<a href="/task/{{$task->id}}">{{ $task->shortDesc }}</a><br>

	    	</li>
	    @endif
	@endforeach

<h2>All Complete Tasks</h2>
	@foreach($tasks as $task)
		@if ($task->tasklist_id == $id && $task->complete == 1)
		<li><a href="/task/{{$task->id}}">{{$task->shortDesc}}</a></li>
		@endif
	@endforeach

@endif

<h2><a href="/task_create">Add A Task to this List</a></h2>

@stop