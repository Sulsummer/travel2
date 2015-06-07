<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentGroup extends Model {

	protected $fillable = ['userId', 'comment', 'noteId', 'refId'];


	public static function getComment($id) {
		return CommentGroup::join("groups","groups.id","=","comment_groups.groupId")
					->join("users","users.id","=","comment_groups.userId")
					->where("groups.id",$id)
					->get();
	}
}
