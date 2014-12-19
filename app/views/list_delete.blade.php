@if (Session::has('message'))
{{Session::get('message')}}
@endif

<h1>Delete a List</h1>
@if (isset($tasklist))
<h2>Deleting List: {{$tasklist->title}}</h2>
<p>{{$tasklist->desc}}</p>
@endif
<h3>Are you sure you want to delete this list?</3>

{{ Form::open(array('url' => '/list/delete')) }}
@if (isset($tasklist))
{{Form::hidden('tasklist_id', $tasklist->id)}}
@endif
{{ Form::submit('Delete This List') }}
{{ Form::close() }}