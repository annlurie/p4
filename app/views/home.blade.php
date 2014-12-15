
        <h1>My To Do Lists</h1>
          <p><a href="/list/create">Add New List</a></p>
          @if(isset($tasklist))
            @foreach ($tasklist as $tasklist)
                  <li><a href="/list/{{$tasklist->id}}">{{ $tasklist->title }}</a></li>
            @endforeach
          @endif