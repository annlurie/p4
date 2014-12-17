<?php

Route::get('/', function()
{
	return View::make('index');
});

/* ALL THE ROUTES FOR LISTS */

Route::get('/list', function()
{
	return View::make('list');
});

Route::get('/list/view', function()
{
	return View::make('list');
});

Route::get('/list/view/{list_id}', function($id)
{
	$tasklist = Tasklist::find($id);
	$tasks = Task::where('tasklist_id','=',$id)->get();
	return View::make('list')
	->with('tasklist', $tasklist)
	->with('tasks', $tasks);
});

Route::get('/list/create', function()
{
	return View::make('list_create');
});

Route::post('/list/create', function()
{
	$data = Input::all();

	$tasklist = new Tasklist();
	$tasklist->title = $data['title'];
	$tasklist->desc = $data['desc'];
	$tasklist->save();

	#echo Pre::render($data);
	#echo Pre::render($tasklist);

	return View::make('list')->with('tasklist', $tasklist);

});

Route::get('/list/update', function()
{
	return View::make('list');
});

Route::get('list/update/{tasklist_id}', array('as' => 'tasklist.edit', function($id) 
{
	return View::make('list_update')
	->with('tasklist', Tasklist::find($id));
}));

Route::post('list/update/{tasklist_id}', function($id) 
{
	$data = Input::all();
	#echo Pre::render($data);

	$tasklist = Tasklist::find($data['id']);
	#echo Pre::render($tasklist);

	$tasklist->title = $data['title'];
	$tasklist->desc = $data['desc'];
	$tasklist->save();
	
	
	$tasklist->save();
	#echo 'Tasklist Updated';
	#echo Pre::render($tasklist->title);
	#echo Pre::render($tasklist->desc);

	return View::make('list')->with('tasklist', $tasklist);
});

Route::get('/list/delete', function()
{
	return View::make('list');
});

Route::get('/list/delete/{list_id}', function($id)
{
	$tasklist = Tasklist::find($id);
	return View::make('list_delete')
	->with('tasklist', $tasklist);
});

Route::post('/list/delete', function()
{
	$data = Input::all();
	echo Pre::render($data);
	$tasklist = Tasklist::find((int)$data['tasklist_id']);
	$task = Task::where('tasklist_id','=',$tasklist->id)->get();
	foreach($task as $tasks)
	{
		$tasks->delete();
	}
	echo 'Tasklist ID is: '.Pre::render($tasklist->id);
	$tasklist->delete();
	echo 'List deleted';
});

/* ALL THE ROUTES FOR TASKS */

Route::get('/task', function()
{
	return View::make('task');
});

Route::get('/task/view', function()
{
	return View::make('task');
});

Route::get('/task/view/{task_id}', function($id)
{
	$task = Task::find($id);
	return View::make('task')
	->with('task', $task);
});

Route::get('/task/create', function()
{
	return View::make('task_create');
});

Route::post('/task/create', function()
{
	$data = Input::all();
	$task = new Task();
	$task->shortDesc = $data['shortDesc'];
	$task->longDesc = $data['longDesc'];
	$task->priority = (int)$data['priority'];
	$task->complete = (int)$data['complete'];
	$task->tasklist_id = (int)$data['tasklist_id'];
	$task->save();
	return View::make('task')->with('task', $task);
});

Route::get('/task/update', function()
{
	return View::make('task_update');
});

Route::get('task/update/{id}', array('as' => 'task.edit', function($id) 
{
	return View::make('task_update')
	->with('task', Task::find($id));
}));

Route::get('task/complete/{id}', function($id)
{
	$task = Task::find($id);
	$task->complete = 1;
	$task->save();
});

Route::post('task/update/{id}', function($id) 
{
	$data = Input::all();
	echo Pre::render($data);

	$task = Task::find($data['id']);

	$task->shortDesc = $data['shortDesc'];
	$task->longDesc = $data['longDesc'];
	$task->priority = (int)$data['priority'];
	$task->save();

	echo 'Task Updated';
	echo Pre::render ($task);
});

Route::get('/task/delete/{task_id}', function($id)
{
	$task = Task::find($id);
	return View::make('task_delete')
	->with('task', $task);
});
/*
Route::post('/list/delete', function()
{
	$data = Input::all();
	echo Pre::render($data);
	$tasklist = Tasklist::find((int)$data['tasklist_id']);
	echo 'Tasklist ID is: '.Pre::render($tasklist->id);
	$tasklist->delete();
	echo 'List deleted';
});

Route::get('/task/delete', function()
{
	return View::make('task_delete');
});
*/
Route::post('/task/delete', function()
{
	$data = Input::all();
	echo Pre::render($data);
	$task = Task::find((int)$data['id']);
	echo 'Task ID is: '.Pre::render($task->id);
	$task->delete();
	echo 'List deleted';
});