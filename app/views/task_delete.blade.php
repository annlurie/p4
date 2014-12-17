<h2>This is the Delete Task View</h2>
@if (isset($task))
<h2>Are you sure you want to delete this task?</h2>
{{$task->shortDesc}}
@endif
{{ Form::open(array('url' => '/task/delete')) }}
@if (isset($task))
{{Form::hidden('id', $task->id)}}
@endif
{{ Form::submit('Delete This Task') }}
{{ Form::close() }}

