@extends('_master')

@section('title')
Task Form
@stop

@section('content')
<h1>Task Update Page</h1>
<h2>Show task info</h2>
{{ $task->shortDesc }}<br>
{{ $task->longDesc }}<br>
{{ $task->priority }}<br>

<h1>New-Style Form</h1>
{{ Form::model($task, array('route' => 'task.edit', $task->id)) }}
{{ Form::hidden('id') }}
{{ Form::label('shortDesc', 'Short Description') }}
{{ Form::text('shortDesc') }} <p>
{{ Form::label('longDesc', 'Description') }} <p>
{{ Form::textarea('longDesc') }} <p>
{{ Form::label('priority', 'Priority') }}
{{ Form::select('priority', array(
'1' => 'High',
'2' => 'Medium',
'3' => 'Low'
)) }} <p>
{{ Form::submit('Update Task') }}
{{ Form::close() }}
@stop