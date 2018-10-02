<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(FilmsTableSeeder::class);
         $this->call(GenresTableSeeder::class);
         $this->call(FilmGenresTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(CommentsTableSeeder::class);
    }
}
