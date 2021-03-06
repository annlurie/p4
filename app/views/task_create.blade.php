@if (Session::has('message'))
{{Session::get('message')}}
@endif

<h2>Add A Task to a List:</h2>
{{ Form::open(array('url' => '/task/create')) }}

{{ Form::label('shortDesc', 'Short Description') }} <br>
{{ Form::text('shortDesc', '') }}
<p>
{{ Form::label('longDesc', 'Description') }} <br>
{{ Form::textarea('longDesc', '') }}
<p>
{{ Form::label('priority', 'Priority') }}<br>
{{ Form::select('priority', array(
'1' => 'High',
'2' => 'Medium',
'3' => 'Low'
), '1') }}
<p>
{{--
{{ Form::label('complete', 'Complete') }} <br>
{{ Form::checkbox('agree') }}
--}}
{{Form::hidden('complete', '0')}}
{{Form::hidden('tasklist_id', '44')}}
<p>
{{ Form::submit('Save') }}
{{ Form::close() }}