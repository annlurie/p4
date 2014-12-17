<h1> Welcome to LIST UPDATE </h1>

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
