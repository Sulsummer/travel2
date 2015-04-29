<?php namespace App\Http\Controllers\Note;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Note;
use Redirect,Input,Auth;

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
		$this->validate($request,[
			'noteTitle' => 'required|max:255',
			'noteContent' => 'required']);

		$note = new Note;
		$note->noteTitle = Input::get('noteTitle');
		$note->authorId = Input::get('authorId');
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
		return view('note.viewnote')->withNote(Note::find($id));
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
		$note->authorId = Input::get('authorId');
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
		$note = Note::find($id);
		$note->delete();
		return Redirect::to('note');

	}

}
