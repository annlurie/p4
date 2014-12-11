@extends('_master')

@section('title')
Task Form
@stop

@section('content')
<h1>Create a New List</h1>
{{ Form::open(array('url' => '/list_create')) }}
{{ Form::label('title', 'Title') }} <p>
{{ Form::text('title', '') }} <p>
{{ Form::label('desc', 'Description') }} <p>
{{ Form::textarea('desc', '') }} <p>
{{ Form::submit('Save') }}
{{ Form::close() }}
@stop
