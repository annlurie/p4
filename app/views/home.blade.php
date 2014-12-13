@extends('_master')

@section ('title')
	View All Lists
@stop

@section ('content')

    <!-- Main jumbotron for headline content/description -->
        <h1>To Do Lists</h1>
        <p>Contents of page: </p>
          <li><a href="/list_create">Add New List</a>
          @if(isset($tasklist))
            @foreach ($tasklist as $tasklist)
                  <li><a href="/list/{{$tasklist->id}}">{{ $tasklist->title }}</a></li>
            @endforeach
          @endif


@stop