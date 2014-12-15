<h2>This is the Delete Task View</h2>
@if (isset($task))
	{{Task Title: {{$task->shortDesc}} }}
@endif
{{ Form::open(array('url' => '/task/delete')) }}
{{ Form::submit('Delete This Task') }}
{{ Form::close() }}

