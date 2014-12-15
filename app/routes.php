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
	return View::make('list')
	->with('tasklist', $tasklist);
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
	return View::make('list_update');
});

Route::get('/list/update/{list_id}', function($id)
{
	$tasklist = Tasklist::find($id);
	return View::make('list_update')
	->with('tasklist', $tasklist);
});

Route::post('/list/update', function()
{
	echo 'List Updated!';
});

Route::get('/list/delete', function()
{
	return View::make('list_delete');
});

Route::get('/list/delete{list_id}', function($id)
{
	return View::make('list_delete');
});

Route::post('/list/delete', function()
{
	echo 'List deleted';
});

Route::get('/list/dtest/{list_id}', function($id)
{
	$tasklist = Tasklist::find($id);
	$tasklist->delete();
	echo 'Tasklist Deleted';
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
	$task->tasklist_id = (int)$data['tasklist_id'];
	$task->save();
	return View::make('task')->with('task', $task);
});

Route::get('/task/update', function()
{
	return View::make('task_update');
});

Route::get('/task/update/{task_id}', function($id)
{
	$task = Task::find($id);
	return View::make('task_update')
	->with('task', $task);
});

Route::post('/task/update', function()
{
	echo 'Task Updated!';
});

Route::get('/task/delete', function()
{
	return View::make('task_delete');
});

Route::post('/task/delete', function()
{
	echo 'Task Deleted!';
});