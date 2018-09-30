<?php

use App\Genre;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('genres')->truncate();
		$faker = Faker::create();

		for($i = 0; $i < 10; $i++) {
			Genre::create([
				'name' => ucfirst($faker->word)
			]);
		}
    }
}
