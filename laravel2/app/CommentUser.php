<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentUser extends Model {

	protected $fillable = ['refId','personId','userId','comment'];

}
