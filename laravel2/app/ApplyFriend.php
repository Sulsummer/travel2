<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyFriend extends Model {

	protected $fillable = ['personId','userId','description','state'];

}
