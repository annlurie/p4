<h1>Welcome to TASK UPDATE</h1>

{{--
{{ Form::open(array('url' => '/task/update')) }}
{{ Form::submit('Save') }}
{{ Form::close() }}
--}}

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

{{--
{{ Form::label('complete', 'Complete This Task') }}
{{ Form::checkbox('complete') }}<p>
--}}

{{ Form::submit('Update Task') }}
{{ Form::close() }}