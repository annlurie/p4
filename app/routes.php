<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* Real Routes! */
Route::get('/', function()
{
	return View::make('home');
});

/* DATABASE PRACTICE ROUTES*/
Route::get('/creating', function() {

    # Instantiate a new Book model class
    $task = new Task();

    # Set 
    $task->shortDesc = 'Create the table for tasks_users';
    $task->longDesc = 'This is one of the things I have to do to finish this project';
    $task->priority = 3;

    # This is where the Eloquent ORM magic happens
    $task->save();

    return 'A new book has been added! Check your database to see...';

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
    $path   = base_path().'/environment.php';

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