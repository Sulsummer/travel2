<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentNote extends Model {

	protected $fillable = ['userId', 'comment', 'noteId', 'refId'];

}
