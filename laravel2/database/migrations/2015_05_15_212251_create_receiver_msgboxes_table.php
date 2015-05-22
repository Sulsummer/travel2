<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiverMsgboxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receiver_msgboxes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('refId')->nullable();
			$table->string('msgContent')->nullable();
			$table->integer('senderId');
			$table->integer('receiverId');
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
		Schema::drop('receiver_msgboxes');
	}

}
