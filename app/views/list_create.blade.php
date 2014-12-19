@if (Session::has('message'))
{{Session::get('message')}}
@endif

<h1>Create a List</h1>
{{ Form::open(array('url' => '/list/create')) }}
{{ Form::label('title', 'Title') }} <p>
{{ Form::text('title', '') }} <p>
{{ Form::label('desc', 'Description') }} <p>
{{ Form::textarea('desc', '') }} <p>
{{ Form::submit('Save') }}
{{ Form::close() }}
