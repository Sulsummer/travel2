<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFriend extends Model {

	protected $fillable = ['userId','friendId'];


	public function getFriend(){
		return $this->hasOne('App\User','id','friendId');
	}

}
