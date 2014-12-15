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
@endif

