<?php namespace App\Http\Controllers\Group;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Group;
use App\GroupMember;
use App\GroupPraise;

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
		$this->validate($request,[
			'groupName' => 'required|max:50']);
		
		$group = new Group;
		$group->groupName = $request->input('groupName');
		$group->captainId = Auth::user()->id;
		$group->startDate = $request->input('startDate');
		$group->endDate = $request->input('endDate');
		$group->destination = $request->input('destination');

		if($group->save()){
			return Redirect::to('group');
		}
		else{
			return Redirect::back()->withInput->withErrors("Failed to create!");
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
		$captainId = Group::find($id)->captainId;
		$captain = DB::table('users')->where('id',$captainId)->get();
		return view('group.viewgroup')->withGroup(Group::find($id))->withCaptain($captain);
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




}
