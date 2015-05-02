<?php namespace App\Http\Controllers\Group\Comment;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\CommentGroup;

use Redirect,Auth,Input;

class CommentGroupController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store(Request $request)
	{
		$commentGroup = new CommentGroup;
		$commentGroup->groupId = $request->input('groupId');
		$commentGroup->refId = $request->input('refId');
		$commentGroup->userId = Auth::user()->id;
		$commentGroup->comment = $request->input('comment');

		if($commentGroup->save()){
			return Redirect::back();
		}
		else{
			return Redirect::back()->withInput()->withErrors('Comment Failed!');
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
		//
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

}
