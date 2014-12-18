@if (Session::has('message'))
{{Session::get('message')}}
@endif

<h2>Delete Task</h2>
@if (isset($task))
<h2>Are you sure you want to delete this task?</h2>
<h3>{{$task->shortDesc}}</h3>
{{$task->longDesc}}
@endif
{{ Form::open(array('url' => '/task/delete')) }}
@if (isset($task))
{{Form::hidden('id', $task->id)}}
@endif
{{ Form::submit('Delete This Task') }}
{{ Form::close() }}

