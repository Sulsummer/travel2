<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment_notes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('refId');
			$table->integer('noteId');
			$table->integer('userId');
			$table->dateTime('date');
			$table->string('comment',500);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comment_notes');
	}

}
