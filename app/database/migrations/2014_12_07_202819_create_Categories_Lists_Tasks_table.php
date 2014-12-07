<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesListsTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
public function up() {

    Schema::create('tasklists', function($table) {

        #Auto-Incrementing Primary Key:
        $table->increments('id');

        # Timestamps for Created_At and Updated_At:
        $table->timestamps();

        # Attributes:
        $table->string('title');
        $table->text('desc');
    });

    Schema::create('tasks', function($table) {

        #Auto-Incrementing Primary Key:
        $table->increments('id');

        # Timestamps for Created_At and Updated_At:
        $table->timestamps();

        # Attributes:
        $table->string('shortDesc');
        $table->text('longDesc');
        $table->integer('priority');
        $table->integer('tasklist_id')->unsigned();

        # Foreign Key (Maps to Tasklists Table):
        $table->foreign('tasklist_id')->references('id')->on('tasklists');
    });

	# Create the categories table
	Schema::create('categories', function($table) {

        #Auto-Incrementing Primary Key:
		$table->increments('id');
        # Timestamps for Created_At and Updated_At:
		$table->timestamps();
        # Attributes:
		$table->string('name', 64);

	}); 
/*
	# Pivot Table for categories:tasks relationship:
	Schema::create('category_task', function($table) {

		# Attributes - A Category and Task Relationship:
		$table->integer('category_id')->unsigned();
		$table->integer('task_id')->unsigned();

		# Foreign Keys (Mapping to Categories and Tasks):
		$table->foreign('category_id')->references('id')->on('categories');
		$table->foreign('task_id')->references('id')->on('tasks');
	}); 
*/
}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasklists');
		Schema::drop('tasks');
		Schema::drop('categories');
		#Schema::drop('category_task');
	}
}