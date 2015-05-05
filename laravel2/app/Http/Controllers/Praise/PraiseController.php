<?php namespace App\Http\Controllers\Praise;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use App\Group;
use App\User;
use App\Note;
use App\GroupPraise;
use App\UserPraise;
use App\NotePraise;
use Redirect;

class PraiseController extends Controller {

	/**
	 * Praise a user.
	 * @param User $id
	 * @return null
	 */
	public static function praise($model,$id){
		$userId = Auth::user()->id;
		switch ($model) {
			case 'User':
				$praise = UserPraise::where('personId',$id)
									->where('userId',$userId)
									->first();
				if(!$praise){
					UserPraise::firstOrCreate([
						'personId' => $id,
						'userId'   => $userId]);
					self::popularityIncrease(User::find($id),$id);
				}
				break;
			
			case 'Group':
				$praise = GroupPraise::where('groupId',$id)
									->where('userId',$userId)
									->first();
				if(!$praise){
					GroupPraise::firstOrCreate([
						'groupId' => $id,
						'userId'   => $userId]);
					self::popularityIncrease(Group::find($id),$id);
				}
				break;

			case 'Note':
				$praise = NotePraise::where('noteId',$id)
									->where('userId',$userId)
									->first();
				if(!$praise){
					NotePraise::firstOrCreate([
						'noteId' => $id,
						'userId'   => $userId]);
					self::popularityIncrease(Note::find($id),$id);
				}
				break;
		}
	}
	
	protected static function popularityIncrease($model,$id){
		$model->popularity = $model->popularity + 1;
		$model->save();
	}

}
