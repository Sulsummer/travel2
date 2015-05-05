<?php namespace App\Http\Controllers\Note;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Note;
use App\Http\Controllers\Praise\PraiseController;
use Redirect,Input,Auth,DB,Response;

class NoteHomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('note.note')->withNotes(Note::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('note.handle.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user = Auth::user();
		$this->validate($request,[
			'noteTitle' => 'required|max:255',
			'noteContent' => 'required']);

		$note = new Note;
		$note->noteTitle = Input::get('noteTitle');
		$note->authorId = $user->id;
		$note->noteContent = Input::get('noteContent');

		if($note->save()){
			return Redirect::to('note');
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
		$isSelf = false;
		$authorId = Note::find($id)->authorId;
		if(Auth::user()->id == $authorId){
			$isSelf = true;
		}	
		$author = DB::table('users')->where('id',$authorId)->get();
		//$data = array('note' => $note, 'author' => $author);
		return view('note.viewnote')->withNote(Note::find($id))
									->withAuthor($author)
									->with('isSelf',$isSelf);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('note.handle.edit')->withNote(Note::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$this->validate($request,[
			'noteTitle' => 'required|max:255',
			'noteContent' => 'required']);

		$note = Note::find($id);
		$note->noteTitle = Input::get('noteTitle');
		$note->noteContent = Input::get('noteContent');

		if($note->save()){
			return Redirect::to('note');
		}
		else{
			return Redirect::back()->withInput->withErrors("Failed to update!");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Note::find($id)->delete();
		return Redirect::to('note');

	}

	/**
	 * Praise one note.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function praise($id){
		PraiseController::praise('Note',$id);
		return Redirect::back();
	}



}
