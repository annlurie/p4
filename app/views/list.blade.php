@extends('_master')

@section('title')
Task Form
@stop

@section('content')
<h2>Show list title and description</h2>
{{ $tasklist->title }}; <br>
{{ $tasklist->desc }}; <br>
{{$id}} <br>

<h2>Show all the tasks associated with the list</h2>

@if(isset($tasks))
	@foreach ($tasks as $task)
		@if ($task->tasklist_id == $id)
	    	<li><a href="/task/{{$task->id}}">{{ $task->shortDesc }}</a></li>
	    @endif
	@endforeach
@endif

<h2>Add A Task:</h2>
{{ Form::open(array('url' => '/task/create')) }}
{{ Form::label('shortDesc', 'Short Description') }} <p>
{{ Form::text('shortDesc', 'Enter Short Description') }} <p>
{{ Form::label('longDesc', 'Description') }} <p>
{{ Form::textarea('longDesc', 'Enter Long Description or Notes or Whatever You Want') }} <p>
{{ Form::label('priority', 'Priority') }}
{{ Form::select('priority', array(
'1' => 'High',
'2' => 'Medium',
'3' => 'Low'
), '1') }} <p>
{{ Form::label('$id', '$id') }}
{{ Form::number('tasklist_id', '(int)$id') }}
{{ Form::submit('Save') }}
{{ Form::close() }}

<h2>See Completed Tasks</h2>
<h2>See All Tasks</h2>

@stop