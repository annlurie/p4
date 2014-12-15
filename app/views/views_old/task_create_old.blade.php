
@extends('_master')
@section('title')
Add a New Task
@stop

@section('content')
<h2>Add A Task:</h2>
{{ Form::open(array('url' => '/task_create')) }}
{{ Form::label('shortDesc', 'Short Description') }} <br>
{{ Form::text('shortDesc', '') }}
<br>
{{ Form::label('longDesc', 'Description') }} <br>
{{ Form::textarea('longDesc', '') }}
<br>
{{ Form::label('priority', 'Priority') }}
{{ Form::select('priority', array(
'1' => 'High',
'2' => 'Medium',
'3' => 'Low'
), '1') }}
{{--
{{ Form::label('$id', 'Enter Task List ID') }} {{$tasklist->id}}
--}}
<br>
{{ Form::number('tasklist_id', '(int)$tasklist->id') }}
<br>
{{ Form::submit('Save') }}
{{ Form::close() }}
@stop