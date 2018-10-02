<?php

use App\Comment;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('comments')->truncate();
		$faker = Faker::create();

		for($i = 1; $i <= 20; $i++) {
			Comment::create([
				'comment' => $faker->realText(),
				'user_id' => rand(1, 3),
				'film_id' => $i
			]);
		}
    }
}
