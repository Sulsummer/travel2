<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;

use App\User;
use App\UserFriend;
use App\UserPraise;
use DB,Redirect;
use App\Http\Controllers\Praise\PraiseController;


class UserHomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$self = Auth::user();
		$friendLists = DB::table('users')
						->join('user_friends','user_friends.friendId','=','users.id')
						->where('user_friends.userId','=',$self->id)
						->get();
		$ownedGroupLists = DB::table('users')
						->join('groups','users.id','=','groups.captainId')
						->where('users.id','=',$self->id)
						->get();
		$joinedGroupLists = DB::table('users')
						->join('group_members','group_members.userId','=','users.id')
						->join('groups','groups.id','=','group_members.groupId')
						->where('users.id','=',$self->id)
						->get();
		$noteLists = DB::table('users')
						->join('notes','users.id','=','notes.id')
						->where('users.id','=',$self->id)
						->get();
		return view('user.self')->withNotes($noteLists)
								->withSelf($self)
								->withFriends($friendLists)
								->with('ownedGroups',$ownedGroupLists)
								->with('joinedGroups',$joinedGroupLists);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if($id == Auth::user()->id){
			return $this->index();
		}
		else{
			
			$friendLists = DB::table('users')
						->join('user_friends','user_friends.friendId','=','users.id')
						->where('user_friends.userId','=',$id)
						->get();
			$ownedGroupLists = DB::table('users')
						->join('groups','users.id','=','groups.captainId')
						->where('users.id','=',$id)
						->get();
			$joinedGroupLists = DB::table('users')
						->join('group_members','users.id','=','group_members.userId')
						->join('groups','groups.id','=','group_members.groupId')
						->where('users.id','=',$id)
						->get();
			$noteLists = DB::table('users')
						->join('notes','users.id','=','notes.id')
						->where('users.id','=',$id)
						->get();
			return view('user.viewuser')->withUser(User::find($id))
										->withFriends($friendLists)
										->with('ownedGroups',$ownedGroupLists)
										->with('joinedGroups',$joinedGroupLists)
										->withNotes($noteLists);

		}
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
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

}
