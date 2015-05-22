<?php namespace App\Http\Controllers\Group\Comment;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\CommentGroup;

use Redirect,Auth,Input;

class CommentGroupController extends Controller {

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



}
