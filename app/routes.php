<?php

Route::get('flashtest', function()
{
	return Redirect::to('/')->with('message', 'here is a flash message');
});

Route::get('/', function()
{
	return View::make('home');
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
	#return Redirect::to('/list/view/$tasklist->id')->with('tasklist', $tasklist)->with('message', 'here is a flash message');
	#return Redirect::route('list/view/', array('tasklist_id' => $tasklist->id));
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
	
	$tasks = Task::where('tasklist_id','=',$id)->get();
	#echo 'Tasklist Updated';
	#echo Pre::render($tasklist->title);
	#echo Pre::render($tasklist->desc);

	#return View::make('list')->with('tasks', $tasks)->with('tasklist', $tasklist);
	return Redirect::to('/list');
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
	return Redirect::to('/list')->with('message', 'List Deleted')->with('listall', $listall);
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
	#echo Pre::render($data);

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
	$task->delete();
	$tasks = Task::where('tasklist_id','=',$tasklist->id)->get();
	#echo 'Task deleted';
	return View::make('list')->with('tasklist', $tasklist)->with('tasks', $tasks);
});

/* Routes for testing and debugging. Keep these! */
Route::get('/debug', function() {
echo '<pre>';
echo '<h1>environment.php</h1>';
$path = base_path().'/environment.php';
try {
$contents = 'Contents: '.File::getRequire($path);
$exists = 'Yes';
}
catch (Exception $e) {
$exists = 'No. Defaulting to `production`';
$contents = '';
}
echo "Checking for: ".$path.'<br>';
echo 'Exists: '.$exists.'<br>';
echo $contents;
echo '<br>';
echo '<h1>Environment</h1>';
echo App::environment().'</h1>';
echo '<h1>Debugging?</h1>';
if(Config::get('app.debug')) echo "Yes"; else echo "No";
echo '<h1>Database Config</h1>';
print_r(Config::get('database.connections.mysql'));
echo '<h1>Test Database Connection</h1>';
try {
$results = DB::select('SHOW DATABASES;');
echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
echo "<br><br>Your Databases:<br><br>";
print_r($results);
}
catch (Exception $e) {
echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
}
echo '</pre>';
});
Route::get('/get-environment',function() {
echo "Environment: ".App::environment();
});
Route::get('/trigger-error',function() {
# Class Foobar should not exist, so this should create an error
$foo = new Foobar;
});

Route::get('/seed', function()
{
	$tasklist = new Tasklist();
	$tasklist->title = 'Second Tasklist...';
	$tasklist->desc = '...created via the seed route.';
	$tasklist->save();
	
	$task = new Task();
	$task->shortDesc = 'Seeded Task #1';
	$task->longDesc = 'This is the first task created via the seed route.';
	$task->priority = 1;
	$task->tasklist_id = $tasklist->id;
	$task->save();

	$task = new Task();
	$task->shortDesc = 'Seeded Task #2';
	$task->longDesc = 'This is the second task created via the seed route.';
	$task->priority = 2;
	$task->tasklist_id = $tasklist->id;
	$task->save();

	$task = new Task();
	$task->shortDesc = 'Seeded Task #3';
	$task->longDesc = 'This is the third task created via the seed route.';
	$task->priority = 3;
	$task->tasklist_id = $tasklist->id;
	$task->save();

	$task = new Task();
	$task->shortDesc = 'Seeded Task #4';
	$task->longDesc = 'This is the fourth task created via the seed route.';
	$task->priority = 1;
	$task->tasklist_id = $tasklist->id;
	$task->save();

		$tasklist = new Tasklist();
	$tasklist->title = 'First Tasklist...';
	$tasklist->desc = '...created via the seed route.';
	$tasklist->save();
	
	$task = new Task();
	$task->shortDesc = 'Seeded Task #1';
	$task->longDesc = 'This is the first task created via the seed route.';
	$task->priority = 1;
	$task->tasklist_id = $tasklist->id;
	$task->save();

	$task = new Task();
	$task->shortDesc = 'Seeded Task #2';
	$task->longDesc = 'This is the second task created via the seed route.';
	$task->priority = 2;
	$task->tasklist_id = $tasklist->id;
	$task->save();

	$task = new Task();
	$task->shortDesc = 'Seeded Task #3';
	$task->longDesc = 'This is the third task created via the seed route.';
	$task->priority = 3;
	$task->tasklist_id = $tasklist->id;
	$task->save();

	$task = new Task();
	$task->shortDesc = 'Seeded Task #4';
	$task->longDesc = 'This is the fourth task created via the seed route.';
	$task->priority = 1;
	$task->tasklist_id = $tasklist->id;
	$task->save();
});