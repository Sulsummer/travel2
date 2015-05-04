<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentGroup extends Model {

	protected $fillable = ['userId', 'comment', 'noteId', 'refId'];

}
