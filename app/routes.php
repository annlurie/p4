<?php
/* Real Routes! */
Route::get('/', function()
{
	return View::make('home');
});

Route::get('/a/b', function ()
{
	echo 'a/b';
});

Route::get('/task/{task_id}', function($id)
{
	$task = Task::find($id);
	return View::make('task')
	->with('task', $task);
});

Route::get('/task_update/{task_id}', function($id)
{
	$task = Task::find($id);
	return View::make('task_update')
	->with('task', $task);
});

Route::post('/task_update', function()
{
	$data = Input::all();
	echo Pre::render($data);
	echo 'Task Updated';
});

Route::get('task/update/{id}', array('as' => 'task.edit', function($id) 
{
	return View::make('task_update')
	->with('task', Task::find($id));
}));

Route::post('task/update', function() {
	// process our form
});

/*
Route::post('/task_create', function()
{
	$data = Input::all();
	echo Pre::render($data);
	$task = new Task();
	$task->shortDesc = $data['shortDesc'];
	$task->longDesc = $data['longDesc'];
	$task->priority = (int)$data['priority'];
	$task->tasklist_id = (int)$data['tasklist_id'];
	$task->save();
	return View::make('task')->with('task', $task);
});

Route::get('/task_create', function()
{
	return View::make('task_create');
});
*/

Route::get('/task/create', function()
{
	return View::make('task_create');
});

Route::post('/task/create', function()
{
	$data = Input::all();
	#echo Pre::render($data);
	$task = new Task();
	$task->shortDesc = $data['shortDesc'];
	$task->longDesc = $data['longDesc'];
	$task->priority = (int)$data['priority'];
	$task->tasklist_id = (int)$data['tasklist_id'];
	$task->save();

	$tasklist = Tasklist::find($task->tasklist_id);
	return View::make('task')
	->with('task', $task)
	->with('tasklist', $tasklist);
});

Route::get('/list/{tasklist_id}', function($id)
{
	$tasklist = Tasklist::find($id);
	$tasks = Task::all();
	return View::make('list')
	->with('tasklist', $tasklist)
	->with('tasks', $tasks)
	->with('id', $id);
});

Route::get('/list_create', function()
{
	return View::make('list_create');
});

Route::post('/list_create', function()
{
	$data = Input::all();
	echo Pre::render($data);
	$tasklist = new Tasklist();
	$tasklist->title = $data['title'];
	$tasklist->desc = $data['desc'];
	$tasklist->save();
	return View::make('/list')->with('tasklist', $tasklist);
});

Route::get('/list_update', function()
{
	return View::make('list_update');
});

Route::post('/list_update', function()
{
	echo 'list updated';
	#return View::make('list');
});

/* DATABASE PRACTICE ROUTES*/
Route::get('/taskTest', function() {
$tasklist = new Tasklist();
$tasklist->title = 'To Dos for P4';
$tasklist->desc = 'Description of list: To Dos for P4';
$tasklist->save();
# Instantiate a new Task
$task = new Task();
# Set
$task->shortDesc = 'Create the table for tasks_users';
$task->longDesc = 'This is one of the things I have to do to finish this project';
$task->priority = 3;
$task->tasklist_id = $tasklist->id;
# This is where the Eloquent ORM magic happens
$task->save();
return 'A new task has been added! Check your database to see...';
});
Route::get('/seedCat', function() {
#Create some preliminary Categories
$category = new Category();
$category->name = 'Work';
$category->save();
#Create some preliminary Categories
$category = new Category();
$category->name = 'Home';
$category->save();
#Create some preliminary Categories
$category = new Category();
$category->name = 'Money';
$category->save();
#Create some preliminary Categories
$category = new Category();
$category->name = 'Kids';
$category->save();
#Create some preliminary Categories
$category = new Category();
$category->name = 'Health';
$category->save();
#Create some preliminary Categories
$category = new Category();
$category->name = 'Hobbies';
$category->save();
return 'Default categories created: Work, Home, Money, Kids, Health, Hobbies';
});
Route::get('/reading', function() {
$task = Task::where('priority', '=', '2')->first();
if($task) {
return $task->shortDesc;
}
else {
return 'Task not found.';
}
});
/* END DATABASE PRACTICE ROUTES*/
/* Throwaway Routes - delete before submitting. */
Route::get('/practice', function() {
echo App::environment();
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
/* For testing database presence. */
Route::get('mysql-test', function() {
# Print environment
echo 'Environment: '.App::environment().'<br>';
# Use the DB component to select all the databases
$results = DB::select('SHOW DATABASES;');
# If the "Pre" package is not installed, you should output using print_r instead
echo Pre::render($results);
});