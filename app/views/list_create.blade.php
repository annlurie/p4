
<h1> Welcome to LIST CREATE </h1>
<h2>Create a List:</h2>
{{ Form::open(array('url' => '/list/create')) }}
{{ Form::label('title', 'Title') }} <p>
{{ Form::text('title', '') }} <p>
{{ Form::label('desc', 'Description') }} <p>
{{ Form::textarea('desc', '') }} <p>
{{ Form::submit('Save') }}
{{ Form::close() }}
