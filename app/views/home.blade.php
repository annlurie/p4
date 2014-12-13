@extends('_master')

@section ('title')
	View All Lists
@stop

@section ('content')

    <!-- Main jumbotron for headline content/description -->
    <div class="jumbotron">
      <div class="container">
        <h1>To Do Lists</h1>
        <p>Contents of page: 
          <li><a href="/list_create">Add New List</a></p>
          @if(isset($tasklist))
  @foreach ($tasklist as $tasklist)
        <li><a href="/list/{{$tasklist->id}}">{{ $tasklist->title }}</a></li>
  @endforeach
@endif
      </div>
    </div>


@stop