<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiverMsgBox extends Model {

	protected $table = 'receiver_msgboxes';
	protected $fillable = ['senderId','receiverId','msgContent'];

}
