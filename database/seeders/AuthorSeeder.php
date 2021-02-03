<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('authors')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'middle_name' => $faker->lastName,
                'year_birth' => $faker->year,
                'year_death' => $faker->year,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
