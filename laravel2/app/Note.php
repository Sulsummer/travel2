<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model {

	public function comment(){
		return $this->hasMany('App\CommentNote', 'noteId', 'id');
	}

}
