<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiverMsgBox extends Model {

	protected $table = 'receiver_msgboxes';
	protected $fillable = ['senderId','receiverId','msgContent'];

	public static function getMsg($userId){
		$msgs = ReceiverMsgBox::where('senderId',$userId)
								->orWhere('receiverId',$userId)
								->orderBy('date','desc')
								->get();

		$personIds = array();
		array_push($personIds, $userId);
		foreach($msgs as $msg){
			array_push($personIds, $msg->senderId, $msg->receiverId);
		}
		$personIds = array_unique($personIds);
		array_shift($personIds);

		$persons = array();
		foreach($personIds as $id){
			array_push($persons, User::find($id));
		}

		return $persons;
	}

	public static function showMsgDetail($id){
		$userId = Auth::user()->id;
		$msgs = ReceiverMsgBox::where('senderId',$id)
								->orWhere('receiverId',$id)
								->where('senderId',$userId)
								->orWhere('receiverId',$userId)
								->orderBy('date','desc')
								->get();
		$names = array($userId => Auth::user()->nickName, $id => User::find($id)->nickName);
		$result = array('msgs' => $msgs, 'names' => $names);
		return $result;
	}
}
