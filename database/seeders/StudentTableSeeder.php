<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 20) as $value) {
            DB::table('students')->insert([
                'nama' => $faker->name,
                'major_id' => $faker->numberBetween($min = 1, $max = 4),
                'ipk' => $faker->numberBetween($min = 1, $max = 4),
            ]);
        }
    }
}
