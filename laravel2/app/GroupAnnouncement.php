<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupAnnouncement extends Model {

	protected $fillable = ['groupId','userId','announcement'];

}
