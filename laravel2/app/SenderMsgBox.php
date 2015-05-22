<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SenderMsgBox extends Model {

	protected $table = 'sender_msgboxes';
	protected $fillable = ['senderId','receiverId','msgContent'];

}
