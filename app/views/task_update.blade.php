@extends('_master')

@section('title')
Task Form
@stop

@section('content')
<h1>Task Update Page</h1>
{{ Form::open(array('url' => '/task/update')) }}
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
@stop