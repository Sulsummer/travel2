<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	public function comment(){
		return $this->hasMany('App\CommentGroup','groupId','id');
	}

}
