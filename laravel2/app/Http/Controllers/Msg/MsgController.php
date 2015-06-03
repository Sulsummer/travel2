<?php namespace App\Http\Controllers\Msg;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Redirect;

use App\User;
use App\ReceiverMsgBox;
use Auth;


class MsgController extends Controller {

	/**
	 * Display all msg for the self div.
	 *
	 * @return Response
	 */
	public function getMsg(){
		$userId = Auth::user()->id;
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

		return view('msg.msg')->with("persons",$persons);
	}


	/**
	 * Display one dialog.
	 * @param message id
	 * @return Response
	 */
	
	public function showMsgDetail($id){
		$userId = Auth::user()->id;
		$msgs = ReceiverMsgBox::where('senderId',$id)
								->orWhere('receiverId',$id)
								->where('senderId',$userId)
								->orWhere('receiverId',$userId)
								->orderBy('date','desc')
								->get();
		$names = array($userId => Auth::user()->nickName, $id => User::find($id)->nickName);
		return view('msg.viewmsg')->with('msgs',$msgs)->with('names',$names);
	}


	/**
	 * Display send message page.
	 * @param $personId
	 * @return Response
	 */
	
	public function sendMsg($personId){
		$person = User::find($personId);
		return view('msg.create')->with('person',$person);
	}

	/**
	 * Store one message.
	 * @param Request
	 * @return Response
	 */
	
	public function store(Request $request){
		$this->validate($request,[
			'msgContent' => 'required|max:255']);

		$personId = $request->input('personId');
		$msgContent = $request->input('msgContent');

		ReceiverMsgBox::create([
		'receiverId' => $personId,
		'senderId'   => Auth::user()->id,
		'msgContent' => $msgContent]);
		
		return Redirect::to('mailbox');
	}



	/**
	 * Display all msg including applies for the self div.
	 *
	 * @return Response
	 */
	public function getAll(){

	}


}
