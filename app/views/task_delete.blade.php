<h2>This is the Delete Task View</h2>
@if (isset($task))
<h2>Deleting Task Number:</h2>
{{$task->id}}
@endif
{{ Form::open(array('url' => '/task/delete')) }}
@if (isset($task))
{{Form::hidden('id', $task->id)}}
@endif
{{ Form::submit('Delete This Task') }}
{{ Form::close() }}

