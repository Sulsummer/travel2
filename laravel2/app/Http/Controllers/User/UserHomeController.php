<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;

use App\User;
use App\UserFriend;
use App\UserPraise;
use App\ApplyFriend;
use App\ReceiverMsgBox;
use DB,Redirect;
use App\Http\Controllers\Praise\PraiseController;
use App\Http\Controllers\Apply\UserApplyController;


class UserHomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$self = Auth::user();

		$friendLists = $this->getFriend($self->id);

		$ownedGroupLists = $this->getOwnedGroup($self->id);
		
		$joinedGroupLists = $this->getJoinedGroup($self->id);

		$noteLists = $this->getNote($self->id);

		$applyToHandle = $this->applyToHandle();

		$applyHasHandle = $this->applyHasHandle();

		$mailPersons = $this->getMsg($self->id);

		return view('user.self')->withNotes($noteLists)
								->withSelf($self)
								->withFriends($friendLists)
								->with('ownedGroups',$ownedGroupLists)
								->with('joinedGroups',$joinedGroupLists)
								->with('applyToHandles',$applyToHandle)
								->with('applyHasHandles',$applyHasHandle)
								->withPersons($mailPersons);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(Auth::user() && $id == Auth::user()->id){
			return $this->index();
		}
		else{
			$friendLists = $this->getFriend($id);
			
			$ownedGroupLists = $this->getOwnedGroup($id);
			
			$joinedGroupLists = $this->getJoinedGroup($id);

			$noteLists = $this->getNote($id);

			$isFriend = $this->isFriend($id);


			return view('user.viewuser')->withUser(User::find($id))
										->withFriends($friendLists)
										->with('ownedGroups',$ownedGroupLists)
										->with('joinedGroups',$joinedGroupLists)
										->withNotes($noteLists)
										->with('isFriend',$isFriend);

		}
		
	}

	/**
	 * Praise one user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function praise($id){
		PraiseController::praise('User',$id);
		return Redirect::back();
	}

	private function isFriend($id){
		if(UserFriend::where('userId','=',$id)->get())
			return true;
		else
			return false;
	}

	/**
	 * Get one's all friends.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	private function getFriend($id){
		return $friendLists = DB::table('user_friends')
						->join('users','user_friends.friendId','=','users.id')
						->where('user_friends.userId','=',$id)
						->get();

	}

	/**
	 * Get one's all owned groups.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	private function getOwnedGroup($id){
		return $ownedGroupLists = DB::table('users')
						->join('group_members','users.id','=','group_members.userId')
						->join('groups','groups.id','=','group_members.groupId')
						->where('users.id','=',$id)
						->where('group_members.isCaptain','=','1')
						->get();

	}

	/**
	 * Get one's all joined groups.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	private function getJoinedGroup($id){
		return $joinedGroupLists = DB::table('users')
						->join('group_members','group_members.userId','=','users.id')
						->join('groups','groups.id','=','group_members.groupId')
						->where('users.id','=',$id)
						->get();

	}

	/**
	 * Get one's all joined groups.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	private function getNote($id){
		return $noteLists = DB::table('users')
						->join('notes','users.id','=','notes.authorId')
						->where('users.id','=',$id)
						->get();

	}

	private function getMsg($id){
		return ReceiverMsgBox::getMsg($id);
	}

	/**
	 * Apply one user to add friend.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function apply($id){
		if(UserApplyController::apply($id))
			return Redirect::back();
		else
			return Redirect::back();
	}

	/**
	 * Accept one's apply.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function acceptApply(Request $request){
		$userId = $request->input('userId');
		$applyId = $request->input('applyId');
		$flag = UserApplyController::acceptApply($applyId);
		if($flag){
			UserFriend::firstOrCreate([
				'userId'    => Auth::user()->id,
				'friendId'  => $userId]);
			UserFriend::firstOrCreate([
				'userId'    => $userId,
				'friendId'  => Auth::user()->id]);
		}

		return Redirect::to('user');
	}


	/**
	 * Delete one's apply.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteApply(Request $request){
		ApplyFriend::destroy($request->input('applyId'));
		return Redirect::to('user');
	}

	/**
	 * Show the apply need handle.
	 *
	 * @param  null
	 * @return Response
	 */
	public function applyToHandle(){
		return UserApplyController::toHandle();

	}

	/**
	 * Show the apply handled.
	 *
	 * @param  null
	 * @return Response
	 */
	public function applyHasHandle(){
		return UserApplyController::hasHandle();

	}

	



}
