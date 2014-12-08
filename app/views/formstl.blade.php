@extends('_master')

@section('title')
Task List Form
@stop

@section('content')
<h1>FORMS FOR DB WRITE TESTING</h1>
<h2>Add A Tasklist:</h2>
{{ Form::open(array('url' => '/formstl')) }}
{{ Form::label('title', 'Title') }} <br>
{{ Form::text('title', 'Enter Tasklist Title') }} <br>
{{ Form::label('desc', 'Description') }} <br>
{{ Form::textarea('desc', 'Best field ever!') }} <br>
{{ Form::submit('Save') }}
{{ Form::close() }}
@stop

