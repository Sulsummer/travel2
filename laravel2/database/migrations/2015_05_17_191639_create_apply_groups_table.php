<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apply_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('userId');
			$table->integer('groupId');
			$table->string('description',255)->nullable();
			$table->dateTime('date');
			$table->integer('state')->default(0);
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
		Schema::drop('apply_groups');
	}

}
