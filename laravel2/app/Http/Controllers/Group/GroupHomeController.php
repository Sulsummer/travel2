<?php namespace App\Http\Controllers\Group;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Group;
use App\GroupMember;
use App\GroupPraise;
use App\GroupAnnouncement;
use App\CommentGroup;

use Redirect,Input,Auth,DB,Response;
use App\Http\Controllers\Praise\PraiseController;


class GroupHomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('group.group')->withGroups(Group::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('group.handle.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$userId = Auth::user()->id;

		$this->validate($request,[
			'groupName' => 'required|max:50']);
		
		$group = new Group;
		$group->groupName = $request->input('groupName');
		$group->setterId = $userId;
		$group->startDate = $request->input('startDate');
		$group->endDate = $request->input('endDate');
		$group->destination = $request->input('destination');

		if($group->save()){
			$groupId = DB::table('groups')
						  ->where('setterId',$userId)
						  ->where('groupName',$group->groupName)
						  ->get();
			GroupMember::firstOrCreate([
				'groupId' => $groupId[0]->id,
				'userId'  => $userId,
				'isCaptain' => 1]);
			return Redirect::to('group');
		}
		else{
			return Redirect::back()->withInput->withErrors("Failed to create!");
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		$group = Group::find($request->input('groupId'));

		$group->groupName = $request->input('groupName');
		$group->setterId = Auth::user()->id;
		$group->startDate = $request->input('startDate');
		$group->endDate = $request->input('endDate');
		$group->destination = $request->input('destination');

		if($group->save()){
			return Redirect::to('group');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$isSelf = false;
		$setterId = Group::find($id)->setterId;
		if(Auth::user() && Auth::user()->id == $setterId){
			$isSelf = true;
		}

		$setter = DB::table('users')->where('id',$setterId)->get();
		
		$memberList = $this->getMemberList($id);
		$announcement = $this->getAnnounce($id);

		$groupComment = $this->getGroupComment($id);
		
		return view('group.viewgroup')->withGroup(Group::find($id))
									  ->withSetter($setter)
									  ->with('isSelf',$isSelf)
									  ->withAnnouncements($announcement)
									  ->with('groupMembers',$memberList)
									  ->with('groupComment',$groupComment);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('group.handle.edit')->withGroup(Group::find($id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Group::find($id)->delete();
		return Redirect::to('group');		
	}

	/**
	 * Join one group.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function join($id){
		GroupMember::firstOrCreate([
			'groupId' => $id,
			'userId'  => Auth::user()->id]);
		return Redirect::back();
	}

	/**
	 * Praise one group.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function praise($id){
		PraiseController::praise('Group',$id);
		return Redirect::back();
	}


	/**
	 * Show the announcement publish page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function announce($id){
		return view('group.createannounce')->withId($id);
	}

	/**
	 * Store the announcement.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function pushAnnounce(Request $request,$id){
		GroupAnnouncement::firstOrCreate([
			'groupId' => $id,
			'userId'  => Auth::user()->id,
			'announcement' => $request->input('announcement')]);
		return Redirect::to('group/viewgroup/'.$id);
	}

	/**
	 * Get the group announcement.
	 *
	 * @param  int  $id
	 * @return Array
	 */
	private function getAnnounce($id){
		
		return $announcement = DB::table('group_announcements')
						  	 ->join('users','users.id','=','group_announcements.userId')
						  	 ->where('groupId',$id)
						  	 ->get();

	}

	/**
	 * Get the group members.
	 *
	 * @param  int  $id
	 * @return Array
	 */
	private function getMemberList($id){

		return $memberList = DB::table('groups')
						   ->join('group_members','groups.id','=','group_members.groupId')
						   ->join('users','users.id','=','group_members.userId')
						   ->where('groups.id','=',$id)
						   ->get();
	}

	private function getGroupComment($id) {
		return CommentGroup::getComment($id);
	}




}
