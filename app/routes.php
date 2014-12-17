<?php

Route::get('/', function()
{
	$listall = Tasklist::all();
	return View::make('list')
	->with('listall', $listall);
});

/* ALL THE ROUTES FOR LISTS */

Route::get('/list', function()
{
	$listall = Tasklist::all();
	return View::make('list')
	->with('listall', $listall);
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
	$tasklist = Tasklist::find((int)$data['tasklist_id']);
	$task = Task::where('tasklist_id','=',$tasklist->id)->get();
	foreach($task as $tasks)
	{
		$tasks->delete();
	}
	$tasklist->delete();
	$listall = Tasklist::all();
	return View::make('list')
	->with('listall', $listall);
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
	$tasklist = Tasklist::find($task->id);
	return View::make('task')
	->with('task', $task);
	#->with('tasklist', $tasklist);
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
	$tasklist = Tasklist::find($task->tasklist_id);
	$tasks = Task::where('tasklist_id','=',$tasklist->id)->get();
	#echo 'Task List: '.$tasklist->id;	
	#Pre::render($tasks);
	#return View::make('task')->with('task', $task)
	#->with('tasklist', $tasklist);
	return View::make('list')
	->with('tasklist', $tasklist)
	->with('tasks', $tasks);
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

Route::post('task/update/{id}', function($id) 
{
	$data = Input::all();
	echo Pre::render($data);

	$task = Task::find($data['id']);

	$task->shortDesc = $data['shortDesc'];
	$task->longDesc = $data['longDesc'];
	$task->priority = (int)$data['priority'];
	$task->save();

	$tasklist = Tasklist::find($task->tasklist_id);
	return View::make('task')
	->with('task', $task);
});

Route::get('task/complete/{id}', function($id)
{
	$task = Task::find($id);
	$task->complete = 1;
	$task->save();
	$tasklist = Tasklist::find($task->id);
	return View::make('task')
	->with('task', $task);
});

Route::get('/task/delete/{task_id}', function($id)
{
	$task = Task::find($id);
	return View::make('task_delete')
	->with('task', $task);
});

Route::post('/task/delete', function()
{
	$data = Input::all();
	#echo Pre::render($data);
	$task = Task::find((int)$data['id']);
	$tasklist = Tasklist::find($task->tasklist_id);
	#echo 'Task ID is: '.Pre::render($task->id);
	#$task->delete();
	#echo 'Task deleted';
	return View::make('list')->with('tasklist', $tasklist);
});