<?php

use App\FilmGenre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('film_genres')->truncate();

    	for($i = 1; $i <= 20; $i++) {
    		$genre_id = rand(1, 10);

			FilmGenre::create([
				'film_id' => $i,
				'genre_id' => rand(1, 10)
			]);

			if ($i % 3) {
				$second_genre = rand(1, 10);

				while($second_genre == $genre_id) {
					$second_genre = rand(1, 10);
				}

				FilmGenre::create([
					'film_id' => $i,
					'genre_id' => $second_genre
				]);
			}
		}
    }
}
