@extends('_master')

@section('title')
Task Form
@stop

@section('content')
<h1>List Update Page</h1>
{{ Form::model($tasklist, array('route' => 'tasklist.edit', $tasklist->id)) }}
{{ Form::hidden('id') }}
{{ Form::label('title', 'Title') }} <p>
{{ Form::text('title') }} <p>
{{ Form::label('desc', 'Description') }} <p>
{{ Form::textarea('desc') }} <p>
{{ Form::submit('Update List') }}
{{ Form::close() }}
@stop