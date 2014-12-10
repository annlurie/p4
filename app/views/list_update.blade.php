@extends('_master')

@section('title')
Task Form
@stop

@section('content')
<h1>FORMS FOR DB WRITE TESTING</h1>
<h2>Add A Task:</h2>
{{ Form::open(array('url' => '/formst')) }}
{{ Form::label('shortDesc', 'Short Description') }} <p>
{{ Form::text('shortDesc', 'Enter Short Description') }} <p>
{{ Form::label('longDesc', 'Description') }} <p>
{{ Form::textarea('longDesc', 'Enter Long Description or Notes or Whatever You Want') }} <p>
{{ Form::label('priority', 'Priority') }} <p>
{{ Form::select('priority', array(
        '1'     => 'High',
        '2'     => 'Medium',
        '3'     => 'Low'
    ), '1') }} <p>
{{ Form::hidden('tasklist_id', '1') }}
{{ Form::submit('Save') }}
{{ Form::close() }}
@stop