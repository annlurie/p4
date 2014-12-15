@extends('_master')

@section('title')
Add a New List
@stop

@section('content')
<h1>Create a New List</h1>
{{ Form::open(array('url' => '/list/create')) }}
{{ Form::label('title', 'Title') }} <p>
{{ Form::text('title', '') }} <p>
{{ Form::label('desc', 'Description') }} <p>
{{ Form::textarea('desc', '') }} <p>
{{ Form::submit('Save') }}
{{ Form::close() }}
@stop
