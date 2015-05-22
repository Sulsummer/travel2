<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSenderMsgboxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sender_msgboxes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('refId')->nullable();
			$table->string('msgContent')->nullable();
			$table->integer('senderId');
			$table->integer('receiverId');
			$table->dateTime('date');
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
		Schema::drop('sender_msgboxes');
	}

}
