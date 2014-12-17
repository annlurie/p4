<h1>Welcome to LIST READ</h1>
<h2>This is the view that shows a single list if a param is passed, or all lists if not.</h2>
@if (isset($tasklist))
	<h2>{{ $tasklist->title }}</h2>
	<h3>{{ $tasklist->desc }}</h3>
 	<a href="/list/update/{{$tasklist->id}}">Edit this list</a>. <br>
	<h2>Here are all the incomplete tasks associated with the list.</h2>
	@if (isset($tasks))
		@foreach($tasks as $task)
			@if ($task->complete == 0)
				<li><a href="/task/update/{{$task->id}}">{{ $task->shortDesc }}</a></li>
			@endif
		@endforeach
	@endif
	<h2>Here are the complete tasks associated with the list.</h2>
	@if (isset($tasks))
		@foreach($tasks as $task)
			@if ($task->complete == 1)
				<li><a href="/task/view/{{$task->id}}">{{ $task->shortDesc }}</a></li>
			@endif
		@endforeach
	@endif
		{{Pre::render($tasklist)}}
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

