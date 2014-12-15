<h1> Welcome to LIST UPDATE </h1>

@if (isset($tasklist))
	{{Pre::render($tasklist)}}
@endif

{{ Form::open(array('url' => '/list/update')) }}
{{ Form::submit('Save') }}
{{ Form::close() }}
