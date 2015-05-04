<?php namespace App\Http\Controllers\Note\Comment;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\CommentNote;


use Redirect,Input,Auth,Session;

class CommentNoteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

//	public function noteComment($id){
//		return view('note.viewnote/{id}');
//	}

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
		return $request;
		$commentNote = new CommentNote;
		$commentNote->noteId = $request->input('noteId');
		$commentNote->refId = $request->input('refId');
		$commentNote->userId = Auth::user()->id;
		$commentNote->comment= $request->input('comment');
		if($commentNote->save()){
			return Redirect::back();
		}
		else{
			return Redirect::back()->withInput()->withErrors("Comment Failed!");
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
