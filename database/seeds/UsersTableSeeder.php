<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
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

		for($i = 0; $i < 3; $i++) {
			User::create([
				'name' => $faker->name(),
				'email' => $faker->email,
				'password' => Hash::make('123456'),
			]);
		}

		User::create([
			'name' => $faker->name(),
			'email' => 'admin@admin.com',
			'password' => Hash::make('123456'),
		]);
    }
}
