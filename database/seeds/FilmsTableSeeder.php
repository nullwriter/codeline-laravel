<?php

use App\Film;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

		Film::create([
			'name' => 'Insidious: The Last Key',
			'description' => 'Lorem Ipsum',
			'release_date' => '2018-10-01 00:00:01',
			'rating' => rand(1, 5),
			'country' => 'United States of America',
			'photo' => '',
			'ticket_price' => 4.50,
		]);

		Film::create([
			'name' => 'The Strange Ones',
			'description' => 'Lorem Ipsum',
			'release_date' => '2017-05-12 00:00:01',
			'rating' => rand(1, 5),
			'country' => 'United States of America',
			'photo' => '',
			'ticket_price' => 6.50,
		]);

		Film::create([
			'name' => 'Sweet Country',
			'description' => 'Lorem Ipsum',
			'release_date' => '2017-09-12 00:00:01',
			'rating' => rand(1, 5),
			'country' => 'United States of America',
			'photo' => '',
			'ticket_price' => 3.50,
		]);

		Film::create([
			'name' => 'Acts of Violence',
			'description' => 'Lorem Ipsum',
			'release_date' => '2013-02-04 00:00:01',
			'rating' => rand(1, 5),
			'country' => 'United States of America',
			'photo' => '',
			'ticket_price' => 3.00,
		]);
    }
}
