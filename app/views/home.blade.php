@extends('_master')

@section ('title')
	Developer's Best Friend
@stop

@section ('content')

    <!-- Main jumbotron for headline content/description -->
    <div class="jumbotron">
      <div class="container">
        <h1>To Do Lists</h1>
        <p>Contents of page: 
          <li>Show all existing lists (each is a link to the list)
          <li><a href="/list_create">Add New List</a> button</p>
      </div>
    </div>


@stop