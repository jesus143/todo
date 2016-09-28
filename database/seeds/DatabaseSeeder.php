<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
 	   $this->call('TodoTableSeeder');
	}
}


class TodoTableSeeder extends Seeder {
	public function run()
	{
		DB::table('todos')->delete();
		DB::table('todos')->insert(
			[
				['user_id' => 1, 'text'=> str_random(40), 'done'=>rand(0,1)],
				['user_id' => 1, 'text'=> str_random(40), 'done'=>rand(0,1)],
				['user_id' => 1, 'text'=> str_random(40), 'done'=>rand(0,1)],
				['user_id' => 1, 'text'=> str_random(40), 'done'=>rand(0,1)],
				['user_id' => 1, 'text'=> str_random(40), 'done'=>rand(0,1)],
				['user_id' => 1, 'text'=> str_random(40), 'done'=>rand(0,1)],
				['user_id' => 1, 'text'=> str_random(40), 'done'=>rand(0,1)],
				['user_id' => 1, 'text'=> str_random(40), 'done'=>rand(0,1)]
			]
		);
	}
}