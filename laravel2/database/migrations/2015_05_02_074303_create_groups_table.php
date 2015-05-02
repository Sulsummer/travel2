<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('groupName',50)->unique();
			$table->integer('captainId');
			$table->dateTime('date');
			$table->dateTime('startDate')->nullable();
			$table->dateTime('endDate')->nullable();
			$table->integer('popularity')->default(0);
			$table->string('destination',500)->nullable();
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
		Schema::drop('groups');
	}

}
