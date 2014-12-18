@if (Session::has('message'))
{{Session::get('message')}}
@endif

<h2>This is the Delete List View</h2>
@if (isset($tasklist))
{{-- 
{{Pre::render($tasklist)}}
--}}
<h3>Basically a Read view of the list.</h3>
<h3>And then a 'Do you want to delete this list? Click the button below.'</3>
@endif

{{ Form::open(array('url' => '/list/delete')) }}
@if (isset($tasklist))
{{Form::hidden('tasklist_id', $tasklist->id)}}
@endif
{{ Form::submit('Delete') }}
{{ Form::close() }}