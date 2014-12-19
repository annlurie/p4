@if (Session::has('message'))
{{Session::get('message')}}
@endif

<h1>View a Task</h1>
@if (isset($task))
	<h2>{{$task->shortDesc}}</h2>
	<h4>{{$task->longDesc}}</h4>
	<li><a href="/list/view/{{$task->tasklist_id}}">Return to List</a></li>
		@if($task->complete == 1)
			{{'This task was completed: '.$task->updated_at}}
		@else
			<li><a href="/task/update/{{$task->id}}">Update this Task</a></li>
			<li><a href="/task/delete/{{$task->id}}">Delete this Task</a></li>
		@endif
@endif