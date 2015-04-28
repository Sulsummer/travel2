<?php
use Illuminate\Database\Seeder;

use App\Note;

class NoteTableSeeder extends Seeder{
	public function run(){
		DB::table('notes')->delete();
		for($i = 0; $i < 10; $i ++){
			Note::create([
				'noteTitle'   => 'Title '.$i,
				'authorId'    => $i,
				'noteContent' => 'Note Content '.$i
				]);
		}
	}
}