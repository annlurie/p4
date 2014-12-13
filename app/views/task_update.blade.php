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

{{ Form::open(array('url' => '/task/update')) }}
{{ Form::label('shortDesc', 'Short Description') }} <p>
{{ Form::text('shortDesc', '$task->shortDesc') }} <p>
{{ Form::label('longDesc', 'Description') }} <p>
{{ Form::textarea('longDesc', '$task->longDesc') }} <p>
{{ Form::label('priority', 'Priority') }}
{{ Form::select('priority', array(
'1' => 'High',
'2' => 'Medium',
'3' => 'Low'
), '$task->priority') }} <p>
{{ Form::label('$id', '$id') }}
{{ Form::number('tasklist_id', '(int)$id') }}
{{ Form::submit('Save') }}
{{ Form::close() }}
@stop