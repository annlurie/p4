@if (Session::has('message'))
{{Session::get('message')}}
@endif

<h1>To-Do List</h1>
@if (isset($listall))
{{'All Lists:'}}
	@foreach($listall as $listall)
		<li><a href="/list/view/{{$listall->id}}">{{ $listall->title }}</a></li>
	@endforeach
	<p><a href="/list/create">Add a new list</a></p>
@endif
@if (isset($tasklist))
	<h2>{{ $tasklist->title }}</h2>
	<h3>{{ $tasklist->desc }}</h3>
 	<a href="/list/update/{{$tasklist->id}}">Edit this list</a>. <br>
 	<a href="/list/delete/{{$tasklist->id}}">Delete this list</a>. <br>
	<h2>Here are all the incomplete tasks associated with the list.</h2>
	<p>Click a task name to view it.</p>
	@if (isset($tasks))
		@foreach($tasks as $task)
			@if ($task->complete == 0)
					<p>
					<strong><a href="/task/view/{{$task->id}}">{{ $task->shortDesc }}</a></strong>
					<br>{{$task->longDesc}}
					<br>{{'Created: '.$task->created_at}}
					<li><a href="/task/update/{{$task->id}}">{{ 'Edit Task' }}</a></li>
					<li><a href="/task/complete/{{$task->id}}">{{'Complete Task'}}</a></li>
					<li><a href="/task/delete/{{$task->id}}">{{'Delete Task'}}</a></li>
					</p>
			@endif
		@endforeach
	@endif
	<h2>Here are the complete tasks associated with the list.</h2>
	<p>Click a task name to view it.</p>
	@if (isset($tasks))
		@foreach($tasks as $task)
			@if ($task->complete == 1)
				<p><strong><a href="/task/view/{{$task->id}}">{{ $task->shortDesc }}</a></strong><br>
				Completed: {{ $task->updated_at }}</p>
			@endif
		@endforeach
	@endif
	<h2>Add A Task To This List</h2>
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
	{{Form::hidden('tasklist_id', $tasklist->id)}}
	<p>
	{{ Form::submit('Save') }}
	{{ Form::close() }}
@endif

