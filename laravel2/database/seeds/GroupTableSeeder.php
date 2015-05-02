<?php
use Illuminate\Database\Seeder;

use App\Group;

class GroupTableSeeder extends Seeder {

	public function run(){
		DB::table('groups')->delete();

		for($i = 0; $i < 10; $i ++){
			Group::create([
				'groupName'  => 'GroupName '.$i,
				'captainId'  => $i,
				'destination'=> 'Destination '.$i]);
		}
	}


}