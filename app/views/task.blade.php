<h1>Welcome to TASK READ</h1>
<h2>This is the view that shows a single task if passed via param, and a friendly error message if not.</h2>
@if (isset($task))
	{{ Pre::render($task) }}
	<h2>Output the contents of the task.</h2>
	<h2>Provide a link back to the associated list.</h2>
	<h2>Link to Update the Task</h2>
	<h2>Link to Delete the Task</h2>
@else
	<h2>I could not find that task. Perhaps you would like to look at <a href="/list">all your lists</a>?</h2>
@endif