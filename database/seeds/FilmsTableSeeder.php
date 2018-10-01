<?php

use App\Film;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('films')->truncate();
		$faker = Faker::create();

		for($i = 0; $i < 20; $i++) {
			Film::create([
				'name' => $faker->company,
				'description' => $faker->text(100),
				'release_date' => $faker->date('Y-m-d'),
				'rating' => rand(1, 5),
				'country' => $faker->country,
				'photo' => $faker->imageUrl(400,550),
				'ticket_price' => rand(2,10),
			]);
		}
    }
}
