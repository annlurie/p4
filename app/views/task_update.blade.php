<h2>Edit a Task</h2>

{{ Form::model($task, array('route' => 'task.edit', $task->id)) }}
{{ Form::hidden('id') }}
{{ Form::label('shortDesc', 'Short Description') }}
{{ Form::text('shortDesc') }} <p>
{{ Form::label('longDesc', 'Description') }} <p>
{{ Form::textarea('longDesc') }} <p>
{{ Form::label('priority', 'Priority') }}
{{ Form::select('priority', array(
'1' => 'High',
'2' => 'Medium',
'3' => 'Low'
)) }} <p>

{{ Form::submit('Update Task') }}
{{ Form::close() }}