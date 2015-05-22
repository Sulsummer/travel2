<?php namespace App\Http\Controllers\Apply;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\UserFriend;
use App\ApplyFriend;
use DB,Redirect;

class UserApplyController extends Controller {

	/**
	 * Apply one user to add friend.
	 *
	 * @param  int  $id
	 * @return boolean
	 */
	public static function apply($id){
		$apply = ApplyFriend::where('personId',Auth::user()->id)
							->where('userId',$id)
							->get();
		if($apply){
			if(ApplyFriend::firstOrCreate([
			'personId' => $id,
			'userId'   => Auth::user()->id,
			'description' => 'temp']))
			return true;
		}
		else
			return flase;
		
	}

	/**
	 * Accept one's apply.
	 *
	 * @param  int  $id
	 * @return boolean
	 */
	public static function acceptApply($id){
		$apply = ApplyFriend::find($id);
		$apply->state = 1;
		if($apply->save()){
			return true;
		}
		else
			return false;
	}

	/**
	 * Show the apply need handle.
	 *
	 * @param  null
	 * @return array
	 */
	public static function toHandle(){	
		return User::join('apply_friends','apply_friends.userId','=','users.id')
						  ->where('personId',Auth::user()->id)
						  ->where('state',0)
						  ->get();
	}

	/**
	 * Show the apply handled.
	 *
	 * @param  null
	 * @return array
	 */
	public static function hasHandle(){
		return User::join('apply_friends','users.id','=','apply_friends.userId')
						  ->where('personId',Auth::user()->id)
						  ->where('state',1)
						  ->get();
	}

}
