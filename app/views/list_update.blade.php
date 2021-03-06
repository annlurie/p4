@if (Session::has('message'))
{{Session::get('message')}}
@endif

<h1>Update a List</h1>

<h2>Editing List: {{$tasklist->title}}</h2>
<p>{{$tasklist->desc}}</p>
{{ Form::model($tasklist, array('route' => 'tasklist.edit', $tasklist->id)) }}
{{ Form::hidden('id') }}
{{ Form::label('title', 'Title') }} <p>
{{ Form::text('title') }} <p>
{{ Form::label('desc', 'Description') }} <p>
{{ Form::textarea('desc') }} <p>
{{ Form::submit('Update List') }}
{{ Form::close() }}
