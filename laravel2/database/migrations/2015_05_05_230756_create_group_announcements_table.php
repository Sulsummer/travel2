<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupAnnouncementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_announcements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('groupId');
			$table->integer('userId');
			$table->dateTime('date');
			$table->string('announcement',500);
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
		Schema::drop('group_announcements');
	}

}
