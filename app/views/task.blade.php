@if (Session::has('message'))
{{Session::get('message')}}
@endif

<h1>View a Task</h1>
@if (isset($task))
	<h2>{{$task->shortDesc}}</h2>
	<h4>{{$task->longDesc}}</h4>
	<li><a href="/list/view/{{$task->tasklist_id}}">Return to List</a></li>
		@if($task->complete == 0)
			<li><a href="/task/update/{{$task->id}}">Update this Task</a></li>
			<li><a href="/task/delete/{{$task->id}}">Delete this Task</a></li>
		@endif
@else
	<h2>I could not find that task. Perhaps you would like to look at <a href="/list">all your lists</a>?</h2>
@endif